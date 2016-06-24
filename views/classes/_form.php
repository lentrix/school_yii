<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */
/* @var $form yii\widgets\ActiveForm */

$division = Yii::$app->user->identity->division;
?>

<div class="classes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'courseId')->dropDownList(
        ArrayHelper::map(
            \app\models\Courses::find()
                ->joinWith('level')
                ->andFilterWhere(['levels.divisionId'=>$division->id])
                ->all(),
            'id', 'fullDetails'
        ),['prompt' => 'Select a course']
    ) ?>

    <?= $form->field($model, 'teacherId')->dropDownList(
        ArrayHelper::map(\app\models\Teachers::find()->all(), 'id', 'fullName'),
        ['prompt' => 'Select teacher']
    ) ?>

    <?= $form->field($model, 'payUnits')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creditUnits')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodId')->dropDownList(
        ArrayHelper::map(\app\models\Periods::find()->andFilterWhere(['active'=>true])->all()
            ,'id', 'longName'),
        ['prompt' => 'Select a period']
    ) ?>

    <?= $form->field($model, 'max')->input("number"); ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
