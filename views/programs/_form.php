<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Programs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortName')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'longName')->textInput(['maxlength' => 225]) ?>

    <?= $form->field($model, 'major')->textInput(['maxlength' => 225]) ?>

    <?= $form->field($model, 'collegeId')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Colleges::find()->all(),'id','longName'),
        ['prompt' => 'Select a college']
    ) ?>

    <?= $form->field($model, 'track')->dropDownList(
        ['academic' => 'Academic', 'techvoc' => 'Technical-Vocational', 'sports' => 'Sports'],
        ['prompt' => 'Select a track']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
