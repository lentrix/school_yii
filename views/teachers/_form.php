<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lastName')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'firstName')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'salutation')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 25]) ?>

    <?= $form->field($model, 'specialty')->textInput(['maxlength' => 125]) ?>

    <?= $form->field($model, 'userId')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'username'),
        ['prompt' => 'Select a user']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
