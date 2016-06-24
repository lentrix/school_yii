<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sections */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sections-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'adviser')->dropDownList(
    	\yii\helpers\ArrayHelper::map(\app\models\Teachers::find()->all(), 'id', 'fullName'),
    	['prompt' => 'Select a teacher']
    ) ?>

    <?= $form->field($model, 'levelId')->dropDownList(
    	\yii\helpers\ArrayHelper::map(
            \app\models\Levels::find()
                ->andFilterWhere(['divisionId'=>1])
                ->orFilterWhere(['divisionId'=>2])
                ->all(), 'id', 'longName'),
    	['prompt' => 'Select a level']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
