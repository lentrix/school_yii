<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClassesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'courseId') ?>

    <?= $form->field($model, 'teacherId') ?>

    <?= $form->field($model, 'payUnits') ?>

    <?= $form->field($model, 'creditUnits') ?>

    <?php // echo $form->field($model, 'periodId') ?>

    <?php // echo $form->field($model, 'collegeId') ?>

    <?php // echo $form->field($model, 'blocked') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
