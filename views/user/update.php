<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update User: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="user-form">

	    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'username')->textInput(['maxlength' => 25]) ?>

	    <?= $form->field($model, 'role')->dropDownList(
	        \app\models\User::getRoles(), ['prompt' => 'Select role']
	    ) ?>

	    <?= $form->field($model, 'divisionId')->dropDownList(
	        ArrayHelper::map(\app\models\Divisions::find()->all(), 'id', 'longName'),
	        ['prompt' => 'Select a division']
	    ) ?>

	    <?= $form->field($model, 'collegeId')->dropDownList(
	        ArrayHelper::map(\app\models\Colleges::find()->all(), 'id', 'longName'),
	        ['prompt' => 'Select a college']
	    ) ?>   

	    <?= $form->field($model, 'picPath')->fileInput(['maxlength' => 255]) ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

	    <?php ActiveForm::end(); ?>

	</div>

</div>
