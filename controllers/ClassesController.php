<?php

namespace app\controllers;

use Yii;
use app\models\Classes;
use app\models\ClassesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\User;

/**
 * ClassesController implements the CRUD actions for Classes model.
 */
class ClassesController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'view', 'create', 'update', 'delete', 'delete-time'],
                'rules' => [
                    [
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create', 'update', 'delete', 'delete-time'],
                        'allow' => true,
                        'roles' => [
                            User::USER_HEAD,
                            User::USER_REGISTRAR,
                            User::USER_ADMIN
                        ]
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Classes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $classes = Classes::find()
                        ->joinWith('course')
                        ->joinWith('course.level')
                        ->joinWith('period')
                        ->andFilterWhere(['levels.divisionId'=>Yii::$app->user->identity->divisionId])
                        ->andFilterWhere(['periods.active'=>1])
                        ->orderBy('courses.name')
                        ->all();
                        
        
        return $this->render('index', [
            'classes' => $classes,
        ]);
    }

    public function actionDeleteTime($scheduleId, $classId) {
        $class = Classes::findOne(['id' => $classId]);

        if($class->userId===Yii::$app->user->identity->id){
            \app\models\Schedules::findOne(['id'=>$scheduleId])->delete();    
        }else {
            throw new \yii\web\ForbiddenHttpException('You are not allowed to perform this action.');
        }
        
        return $this->redirect(['classes/view', 'id'=>$classId]);
    }

    /**
     * Displays a single Classes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $sched = new \app\models\Schedules;
        $conflict = 0;

        if($sched->load(Yii::$app->request->post())) {
            $conflict = $sched->conflict();
            if(!$conflict && $sched->save()){
                $sched = new \app\models\Schedules;
                $conflict = false;
            }
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'sched' => $sched,
            'conflict' => $conflict,
        ]);
    }

    /**
     * Creates a new Classes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Classes();

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
     * Updates an existing Classes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $user = Yii::$app->user->identity;
        $model = $this->findModel($id);

        if($user->id!==$model->userId && $user->role!==User::USER_ADMIN){
            throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Classes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {   
        $user = Yii::$app->user->identity;
        $model = $this->findModel($id);

        if($user->id!==$model->userId && $user->role!==User::USER_ADMIN){
            throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }

        foreach($model->schedules as $schedule) {
            $schedule->delete();
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Classes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Classes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
