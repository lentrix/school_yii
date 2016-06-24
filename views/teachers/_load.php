<?php 

if ($id):

$period = \app\models\Periods::findOne(['id'=>$periodId]);
$teacher = \app\models\Teachers::findOne(['id'=>$id]);

$load = \app\models\Classes::find()
	->andFilterWhere(['teacherId'=>$id, 'periodId'=>$periodId])
	->all();
?>

<div class="panel panel-info">
	<div class="panel-heading">
		<span class="big">
			<?= $period->longName ?>
		</span>
	</div>
	<div class="panel-body">
		<p>
			<strong>Teacher's Load</strong><br />
			<?= $period->longName ?>
		</p>
		<p class="medium">
			Teacher: <?= $teacher->fullName ?>
		</p>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Course</th>
					<th>Description</th>
					<th>Units</th>
					<th>Density</th>
					<th>Schedule</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($load as $class): ?>
				<tr>
					<td><?= $class->id ?></td>
					<td><?= \yii\helpers\Html::a($class->course->name, ['classes/view', 'id'=>$class->id]) ?></td>
					<td><?= $class->course->description ?></td>
					<td><?= $class->creditUnits ?></td>
					<td><?= $class->density ?></td>
					<td><?= $class->scheduleString ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<?php endif; ?>