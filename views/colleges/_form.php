<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Colleges */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colleges-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortName')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'longName')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'head')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'headTitle')->textInput(['maxlength' => 25]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
