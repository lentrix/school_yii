<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\components\AccessRule;
use app\models\User;
use app\models\Enrol;

class WithdrawalController extends \yii\web\Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'withdraw'],
                'rules' =>[
                    [
                        'actions' => ['index','withdraw'],
                        'allow' => true,
                        'roles' => [User::USER_ADMIN, User::USER_REGISTRAR]
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'withdraw' => ['post'],
                    'confirm-withdraw' => ['post']
                ],
            ],
        ];
    }

    public function actionIndex()
    {
    	$enrolees = \app\models\Enrol::find()
    		->joinWith('period')
    		->joinWith('student')
    		->andFilterWhere(['periods.active'=>true])
    		->orderBy('students.lastName, students.firstName')
    		->all();

        return $this->render('index', ['enrolees'=>$enrolees]);
    }

    public function actionWithdraw()
    {
    	$enrol = \app\models\Enrol::findOne(['id'=>$_POST['studs']]);
        return $this->render('withdraw',['enrol'=>$enrol]);
    }

    public function actionConfirmWithdraw($enrolId) {
        $enrol = Enrol::findOne(['id'=>$enrolId]);

        //change enrolled classesEnrolled remarks to withdrawn
        foreach($enrol->classesEnrolleds as $classEnrolled) {
            $classEnrolled->remarks = "withdrawn";
            $classEnrolled->withdrawn = 1;
            $classEnrolled->save();
        }
        //change the status of the enrol to Enrol::STATUS_WITHDRAWN
        $enrol->status = Enrol::STATUS_WITHDRAWN;
        $enrol->save();

        return $this->redirect(['/enrolment/classes', 'id'=>$enrol->id]);
    }
}
