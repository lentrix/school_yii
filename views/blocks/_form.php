<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Periods;
use app\models\Levels;

/* @var $this yii\web\View */
/* @var $model app\models\Blocks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blocks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodId')->dropDownList(
    	ArrayHelper::map(Periods::find()->andFilterWhere(['active'=>true])->all(), 'id', 'longName'),
    	['prompt' => 'Select a period']
    ) ?>

    <?= $form->field($model, 'levelId')->dropDownList(
    	ArrayHelper::map(Levels::find()->all(), 'id', 'longName'),
    	['prompt'=>'Select a level']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
