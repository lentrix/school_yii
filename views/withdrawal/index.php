<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Withdrawal';
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Withdrawal Process</h1>
<div>
	<?php $form=ActiveForm::begin(['action'=>['withdrawal/withdraw']]); ?>

	<label>Select student to withdraw</label>
	<?= Html::dropDownList("studs",null,ArrayHelper::map($enrolees, 'id', 'student.fullName'), 
			['prompt'=>'Select a student', 'id'=>'studSelect']); ?>

	<?= Html::submitButton("Withdraw",['class'=>'btn btn-danger']) ?>

	<?php ActiveForm::end(); ?>
</div>