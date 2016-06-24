<?php 
use yii\helpers\Html;
use app\components\MyWidgets;
?>

<div class="panel panel-info">
	<div class="panel-heading">
		<span class="big">
			Registrar Panel
		</span>
	</div>
	<div class="panel-body">
		<center>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-education", "Students", "/students" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-star", "Enrolment", "/enrolment" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-remove-circle", "Withdrawal", "/withdrawal" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-th", "Sections", "/sections" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-tasks", "Blocks", "/blocks" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-briefcase", "Programs", "/programs" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-folder-open", "Courses", "/courses" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-arrow-up", "Levels", "/levels" ) ?>
		</center>
	</div>
</div>
