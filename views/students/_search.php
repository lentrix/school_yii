<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lastName') ?>

    <?= $form->field($model, 'firstName') ?>

    <?= $form->field($model, 'middleName') ?>

    <?= $form->field($model, 'birthDate') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'citizen') ?>

    <?php // echo $form->field($model, 'religion') ?>

    <?php // echo $form->field($model, 'father') ?>

    <?php // echo $form->field($model, 'mother') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'userId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
