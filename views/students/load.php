<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = 'Study Load';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div>
	<span class="pull-right">
		<?= Html::dropDownList("studs",null,ArrayHelper::map($enrols, 'id', 'student.fullName'), 
			['prompt'=>'Select a student', 'id'=>'studSelect']); ?>
		<button class="btn btn-primary btn-xs" onclick="openLoad()">
			<i class='glyphicon glyphicon-arrow-right'></i>
		</button>
	</span>
	<h1><?= $this->title ?></h1>	
</div>

<?php if($enrol) : ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<span class="medium"><?= $enrol->period->longName ?></span>
	</div>
	<div class="panel-body">
		<p>
			<strong>STUDY LOAD</strong><br />
			<?= $enrol->period->longName ?>
		</p>
		<p>
			<strong><?= $enrol->student->fullName ?></strong> <?= $enrol->levelStr ?>
		</p>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Course</th>
					<th>Description</th>
					<th>Units</th>
					<th>Schedule</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($enrol->classesEnrolleds as $classEnrolled) : ?>

				<tr>
					<td>
						<?= Html::a($classEnrolled->class->course->name, 
							['classes/view', 'id'=>$classEnrolled->class->id]) ?>
					</td>
					<td><?= $classEnrolled->class->course->description ?></td>
					<td><?= $classEnrolled->class->creditUnits ?></td>
					<td><?= $classEnrolled->class->scheduleString ?></td>
				</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<?php endif; ?>

<script>
function openLoad() {
	var obj = document.getElementById('studSelect');
	var id = obj.options[obj.selectedIndex].value;
	window.location.href = 'index.php?r=students/load&enrolId=' + id;
}
</script>