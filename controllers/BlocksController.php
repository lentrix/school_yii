<?php

namespace app\controllers;

use Yii;
use app\models\Blocks;
use app\models\BlocksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BlocksController implements the CRUD actions for Blocks model.
 */
class BlocksController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Blocks models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlocksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Blocks model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id, $msg=0)
    {
        $model = $this->findModel($id);

        $classesInLevel = \app\models\Classes::find()
            ->joinWith('course')
            ->joinWith('period')
            ->andFilterWhere(['courses.levelId'=>$model->levelId])
            ->andFilterWhere(['blocked'=>false])
            ->orderBy('courses.name')
            ->all();

        $classesInDivision = \app\models\Classes::find()
            ->joinWith('course')
            ->joinWith('period')
            ->joinWith('course.level')
            ->andFilterWhere(['periods.active'=>true])
            ->andFilterWhere(['levels.divisionId'=>$model->level->divisionId])
            ->andFilterWhere(['blocked'=>false])
            ->orderBy('courses.name')
            ->all();

        return $this->render('view', [
            'model' => $model,
            'classesInLevel' => $classesInLevel,
            'classesInDivision' => $classesInDivision,
            'msg' => $msg
        ]);
    }

    public function actionAddClass($classId, $blockId) {
        $class = \app\models\Classes::findOne(['id'=>$classId]);

        $msg = "";

        if($conflict = $this->conflict($class, $blockId)) {
            $conflictSched = \app\models\Schedules::findOne(['id'=>$conflict]);
            $msg = "The class you are trying to add is in conflict with " 
            . $conflictSched->class->course->name . " " . $conflictSched->class->scheduleString;
        }else{
            $blockClass = new \app\models\BlockClasses;
            $blockClass->blockId = $blockId;
            $blockClass->classId = $classId;
            $blockClass->save();

            //add the class to each student assigned with this block.
            $enrols = \app\models\Enrol::find()->andFilterWhere(['blockId'=>$blockId])->all();
            foreach($enrols as $enrol){
                $classEnrolled = new \app\models\ClassesEnrolled;
                $classEnrolled->enrolId = $enrol->id;
                $classEnrolled->classId = $classId;
                $classEnrolled->save();
            }
            
            $class->blocked=true;
            $class->save();
        } 

        return $this->redirect(['view', 'id'=>$blockId, 'msg'=>$msg]);
    }

    public function actionRemoveClass($blockClassId) {
        $blockClass = \app\models\BlockClasses::findOne(['id'=>$blockClassId]);
        $blockId = $blockClass->block->id;
        $class = $blockClass->class;
        $class->blocked = 0;
        $class->save();
        $blockClass->delete();

        // the class from the students using this block.
        $cmd = Yii::$app->db->createCommand(
            "DELETE FROM classesEnrolled 
            WHERE enrolId IN (SELECT id FROM enrol WHERE blockId=:blockId)
            AND classId = :classId"
        );
        $cmd->bindValue(':blockId', $blockClass->block->id);
        $cmd->bindValue(':classId', $class->id);
        $cmd->execute();

        return $this->redirect(['view', 'id'=>$blockId]);
    }

    /**
     * Creates a new Blocks model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Blocks();
        $model->userId = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Blocks model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Blocks model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Blocks model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Blocks the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Blocks::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function conflict($class, $blockId) {
        foreach($class->schedules as $sched) {
            $startPlus = date('H:i', strtotime($sched->start)+100);
            $endDown = date('H:i', strtotime($sched->end)-50);

            $command = Yii::$app->db->createCommand(
                "SELECT `s`.`id`, `s`.days FROM `schedules` `s`
                 LEFT JOIN `classes` `c` ON `c`.`id`=`s`.`classId`
                 LEFT JOIN `blockClasses` `bc` ON `bc`.`classId`=`c`.`id`
                 WHERE (`s`.`start` BETWEEN :st AND :endd 
                       OR `s`.`end` BETWEEN :stp AND :end)
            AND `bc`.`blockId` = :blockId");
            $command->bindValue(':st', $sched->start);
            $command->bindValue(':stp', $startPlus);
            $command->bindValue(':end', $sched->end);
            $command->bindValue(':endd', $endDown);
            $command->bindValue(':blockId', $blockId);

            $data = $command->queryAll();

            $thisDays = explode(',', $sched->days);

            foreach($data as $s) {
                $days = explode(',', $s['days']);
                foreach($thisDays as $thisday){
                    if(array_search($thisday, $days)){
                        return $s['id'];
                    }
                }
            }

        }
    }
}
