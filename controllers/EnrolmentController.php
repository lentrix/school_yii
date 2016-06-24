<?php

namespace app\controllers;

use yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;
use app\models\Students;
use app\models\Enrol;
use app\models\Classes;
use app\models\ClassesEnrolled;
use app\models\Schedules;

class EnrolmentController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'student', 'program', 'classes', 'view', 'add-class'],
                'rules' =>[
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'student', 'program', 'classes', 'add-class'],
                        'allow' => true,
                        'roles' => [User::USER_ADMIN, User::USER_REGISTRAR]
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'add-class' => ['post'],
                    'remove-class' => ['post']
                ],
            ],
        ];
    }

    public function actionClasses($id, $msg=0)
    {
        $enrol = Enrol::findOne(['id'=>$id]);

        if($enrol->programId){
            $classes = Classes::find()
                ->joinWith('course')
                ->joinWith('period')
                ->joinWith('course.level')
                ->andFilterWhere(['periods.active'=>true])
                ->andFilterWhere(['levels.divisionId'=>$enrol->level->divisionId])
                ->orderBy('courses.name')
                ->all();
        }else {
            $classes = 0;
        }

        $blocks = \app\models\Blocks::find()
            ->joinWith('period')
            ->andFilterWhere(['periods.active'=>true])
            ->andFilterWhere(['levelId'=>$enrol->levelId])
            ->all();

        return $this->render('classes', ['enrol'=>$enrol, 'classes' => $classes,'blocks'=>$blocks, 'msg'=>$msg]);
    }

    public function actionAddClass($enrolId, $classId) {
        $enrol = Enrol::findOne(['id'=>$enrolId]);
        $class = Classes::findOne(['id'=>$classId]);
        $msg = "";

        if($conflictSchedId = $enrol->conflict($class)) {
            $conflictSched = Schedules::findOne(['id'=>$conflictSchedId]);

            $msg .= "<span>The class you added is in conflict with " 
            . $conflictSched->class->course->name . " " .$conflictSched->class->scheduleString ."</span>";
        }else if($duplicateCourse = $enrol->duplicateCourse($class)){
            $msg .= "<span>Duplicate course for " . $duplicateCourse->name . ".</span>";
        }else if($class->density===$class->max) {
            $msg .= "<span>" . $class->course->name . " " . $class->scheduleString . " is already closed with " . $class->max . " students.</span>";
        }else {

            $classEnrolled = new ClassesEnrolled;
            $classEnrolled->enrolId = $enrolId;
            $classEnrolled->classId = $classId;

            if($classEnrolled->save()) {
                $msg = 0;
            }else {
                $msg .= "<span>Unknown Error</span>";
            }
        }

        return $this->redirect(['classes', 'id'=>$enrolId, 'msg'=>$msg]);
    }

    public function actionRemoveClass($id) {
        $model = ClassesEnrolled::findOne(['id'=>$id]);
        $enrolId = $model->enrolId;
        $model->delete();
        return $this->redirect(['classes', 'id'=>$enrolId]);
    }

    public function actionSelectBlock($blockId, $enrolId) {
        $block = \app\models\Blocks::findOne(['id'=>$blockId]);
        $enrol = \app\models\Enrol::findOne(['id'=>$enrolId]);

        //remove all previous classes..
        $cmd = Yii::$app->db->createCommand(
            "DELETE FROM classesEnrolled WHERE enrolId=:enrolId");
        $cmd->bindValue(':enrolId', $enrolId);
        $cmd->execute();

        $enrol->blockId = $blockId;
        $enrol->save();

        //add classesEnrolled..
        foreach($block->blockClasses as $blockClass) {
            $classEnrolled = new \app\models\ClassesEnrolled;
            $classEnrolled->enrolId = $enrolId;
            $classEnrolled->classId = $blockClass->class->id;
            $classEnrolled->save();
        }

        return $this->redirect(['classes', 'id'=>$enrolId]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProgram($id)
    {
        $student = Students::findOne(['id'=>$id]);
        $enrol = Enrol::find()
            ->joinWith('period')
            ->andFilterWhere(['studentId'=>$student->id])
            ->andfilterWhere(['periods.active'=>true])
            ->all();
        
        //die("<pre>" . count($enrol) . "</pre>");

        if(count($enrol)>0) {
            return $this->redirect(['/enrolment/classes', 'id'=>$enrol[0]->id]);
        }else {
            $enrol = new Enrol;
            $enrol->studentId = $student->id;
            $enrol->date = date('Y-m-d');
        }

        if ($enrol->load(Yii::$app->request->post()) && $enrol->save()) {
            return $this->redirect(['/enrolment/classes', 'id'=>$enrol->id]);
        }

        return $this->render('program', ['student'=>$student, 'enrol'=>$enrol]);
    }

    public function actionUpdate($id) {
        $enrol = Enrol::findOne(['id'=>$id]);

        if ($enrol->load(Yii::$app->request->post()) && $enrol->save()) {
            return $this->redirect(['/enrolment/classes', 'id'=>$enrol->id]);
        }

        return $this->render('program', ['enrol'=>$enrol, 'student'=>$enrol->student]);
    }

    public function actionStudent()
    {
        return $this->render('student');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
