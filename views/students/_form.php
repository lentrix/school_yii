<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'lastName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'firstName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'middleName')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'birthDate')->widget(
            DatePicker::className(), [
                // inline too, not bad
                 'inline' => false, 
                 // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>

        <?= $form->field($model, 'gender')->dropDownList(['female'=>'Female', 'male'=>'Male'],['prompt'=>'Select gender']) ?>

        <?= $form->field($model, 'status')->dropDownList(
            ['Single'=>'Single','Married'=>'Married','Widow'=>'Widow', 'Widower'=>'Widower'],
            ['prompt'=>'Select civil status']
        ) ?>

        <?= $form->field($model, 'religion')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'citizen')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'father')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mother')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'photo')->fileInput() ?>
    </div>
    

    <div class="form-group col-md-12">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
