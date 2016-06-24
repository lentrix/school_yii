<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = "Enrolment Phase 3 - Classes";
$this->params['breadcrumbs'][] = ['label'=>'Enrolment', 'url'=>['/enrolment']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= $this->title; ?></h1>

<div class='row'>
	<div class="col-md-3">
		<div class="panel panel-info">
			<div class="panel-heading">
				<span class="medium">
					<span class="pull-right">
						<?= Html::a('<i class="glyphicon glyphicon-edit"></i>',
							['enrolment/update', 'id'=>$enrol->id],
							['class'=>'btn btn-xs btn-info']
						) ?>
					</span>
					Enrolment Profile
				</span>
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-striped table-condensed">
					<tr><th>Student Name</th></tr>
					<tr><td><?= $enrol->student->fullName; ?></td></tr>
					<tr><th>Level</th></tr>
					<tr><td><?= $enrol->levelStr; ?></td></tr>
					<tr><th>Date enrolled</th></tr>
					<tr><td><?= date('F d, Y', strtotime($enrol->date)); ?></td></tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<?php if($msg): ?>
			<div class="error-message">
				<?= $msg ?>
			</div>
		<?php endif; ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<span class="medium">Class Schedule</span>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
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
							<td><?= $classEnrolled->class->course->name ?></td>
							<td><?= $classEnrolled->class->course->description ?></td>
							<td><?= $classEnrolled->class->creditUnits ?></td>
							<td>
								<span class='pull-right'>
									<?= Html::a('<i class="glyphicon glyphicon-remove"></i>',
										['remove-class', 'id'=>$classEnrolled->id],
										[
											'class'=>'btn btn-danger btn-xs', 
											'data'=>[
												'method'=>'post',
												'confirm' => 'You are about to remove ' . $classEnrolled->class->course->name . '.',
											]
										] ); ?>
								</span>
								<?= $classEnrolled->class->scheduleString ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				

			</div>
		</div>
	</div>
</div>
<hr />

<?php if($enrol->status!==\app\models\Enrol::STATUS_WITHDRAWN) : ?>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="active">
			<a href="#classes-tab" data-toggle="tab">Classes</a>
		</li>
		<li>
			<a href="#blocks-tab" data-toggle="tab">Blocks</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="classes-tab">
			<?php if($enrol->programId) : ?>

			<h3>Available Class Offerings</h3>

			<?php foreach($classes as $class) : ?>
				<?php if($enrol->notYetEnrolled($class->id)) : ?>
			<div class="col-md-6">
				<div class='dim-block' style="margin-bottom: 12px">
					<span class='pull-right'>
						<?= Html::a('<i class="glyphicon glyphicon-plus"></i>', 
						['add-class', 'enrolId'=>$enrol->id, 'classId'=>$class->id],
						['class'=>'btn btn-primary', 'data'=>['method'=>'post']]
						) ?>
					</span>
					<span class="single-line">
						<?= $class->course->name; ?> - <?= $class->course->description; ?> | <?= $class->creditUnits; ?> units
					</span>
					<span class="single-line">
						<?= $class->scheduleString; ?>
					</span>
				</div>
			</div>
				<?php endif; ?>
			<?php endforeach; ?>

			<?php endif; ?>
		</div>
		<div class="tab-pane" id="blocks-tab">
			
		<?php if($blocks) : ?>
			<h3>Blocks</h3>
			<p>Select from among the <?= $enrol->level->longName ?> blocks.</p>
			<p>
				Please note that by selecting a block, all previously enrolled classes of <?= $enrol->student->fullname ?>
				will be removed and replaced by the set of classes indicated by the block.
			</p>
			<p>
				All addition classes such as back subjects must be added later.
			</p>
			<?php foreach($blocks as $block): ?>
				<div class="col-md-4 dim-block">
					<span class="pull-right">
						<?= Html::a(
							"<i class='glyphicon glyphicon-ok'></i>",
							['select-block', 'blockId'=>$block->id, 'enrolId'=>$enrol->id],
							['class'=>'btn btn-primary btn-sm']
						); ?>
					</span>
					<div class="medium">
						Block Name: <?= $block->name ?>
					</div>
					<div>
						Number of classes: <?= count($block->blockClasses) ?>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
			<h3>No blocks for this level.</h3>
		<?php endif; ?>

		</div>
	</div>
</div>
<?php else : ?>
	<div class="overlap">
		
	</div>
<?php endif; ?>