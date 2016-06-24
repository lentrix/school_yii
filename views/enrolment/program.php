<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Programs;
use app\models\Levels;
use app\models\Sections;
use app\models\Periods;
use yii\widgets\ActiveForm;

$this->title = "Enrolment Phase 2 - Program";
$this->params['breadcrumbs'][] = ['label'=>'Phase 1 - Student', 'url'=>['/enrolment']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= $this->title; ?></h1>

<div class='row'>
	<div class="col-md-6">
		<h3>Student Info</h3>
		<table class="table table-bordered">
			<tr>
				<th>ID Number</th>
				<td><?= sprintf("%09d",$student->id); ?></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td><?= $student->lastName; ?></td>
			</tr>
			<tr>
				<th>First Name</th>
				<td><?= $student->firstName; ?></td>
			</tr>
			<tr>
				<th>Middle Name</th>
				<td><?= $student->middleName; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<h3>Program Details</h3>

		<?php $form = ActiveForm::begin(); ?>

		<div class='error'>
			<?= $form->errorSummary($enrol); ?>
		</div>

		<?= $form->field($enrol, 'periodId')->dropDownList(
			ArrayHelper::map(Periods::find()
				->orderBy('longName')
				->andFilterWhere(['active'=>1])
				->all(), 'id', 'longName'),
			['prompt'=>'Select a period']
		) ?>

		<?= $form->field($enrol, 'programId')->dropDownList(
			ArrayHelper::map(Programs::find()->orderBy('shortName')->all(), 'id', 'fullDetails'),
			['prompt'=>'Select a program']
		) ?>

		<?= $form->field($enrol, 'levelId')->dropDownList(
			ArrayHelper::map(Levels::find()->orderBy('longName')->all(), 'id', 'longName'),
			['prompt'=>'Select a level']
		) ?>

		<?= $form->field($enrol, 'status')->dropDownList(
			[1=>'Regular',2=>'Freshmen',3=>'Transferee'],
			['prompt'=>'Select an enrolment status']
		); ?>

		<?= $form->field($enrol, 'sectionId')->dropDownList(
			ArrayHelper::map(Sections::find()->orderBy('name')->all(), 'id', 'name'),
			['prompt'=>'Select a section']
		) ?>



		<?= Html::submitButton("<i class='glyphicon glyphicon-arrow-right'></i> Proceed to Phase 3", 
		['class'=>'btn btn-lg btn-primary']); ?>

		<?php ActiveForm::end(); ?>
	</div>
</div>
		