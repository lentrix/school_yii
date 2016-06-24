<?php
/* @var $this yii\web\View */
use yii\widgets\GridView;
use yii\helpers\Html;

$this->title = 'Withdrawal | ' . $enrol->student->fullName;
$this->params['breadcrumbs'][] = ['label'=>'Withdrawal', 'url' => ['/withdrawal']];
$this->params['breadcrumbs'][] = $enrol->student->fullName;
?>

<h1>Withdraw Enrolment</h1>
<h3>
	<?= $enrol->student->fullName ?>
	<?= $enrol->program ? $enrol->program->shortName : '' ?> - 
	<?= $enrol->level->shortName ?>
</h3>

<div>
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
<div>
	<?php if($enrol->status===\app\models\Enrol::STATUS_WITHDRAWN) : ?>

	<p class="big" style="color: red">This enrolment has already been withdrawn.</p>
	
	<?php else : ?>	

	<?= Html::a(
		'Confirm Withdrawal', 
		[
			'/withdrawal/confirm-withdraw', 
			'enrolId'=>$enrol->id
		],
		[
			'class' => 'btn btn-lg btn-danger',
			'data' => [
                'method' => 'post',
            ],
        ]
	); ?>

	<?php endif; ?>

</div>