<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Divisions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="divisions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortName')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'longName')->textInput(['maxlength' => 225]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
