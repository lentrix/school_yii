<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shortName') ?>

    <?= $form->field($model, 'longName') ?>

    <?= $form->field($model, 'major') ?>

    <?= $form->field($model, 'collegeId') ?>

    <?php // echo $form->field($model, 'track') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
