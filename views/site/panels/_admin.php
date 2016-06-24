<?php 
use yii\helpers\Html;
use app\components\MyWidgets;
?>

<div class="panel panel-info">
	<div class="panel-heading">
		<span class="big">
			Administrator Panel
		</span>
	</div>
	<div class="panel-body">
		<center>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-folder-open", "Class Offerings", "/classes" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-list-alt", "Class List", "/classes/class-list" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-user", "Users", "/user" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-book", "Teachers", "/teachers" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-leaf", "Periods", "/periods" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-map-marker", "Venues", "/venues" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-folder-open", "Courses", "/courses" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-star", "Enrolment", "/enrolment" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-remove-circle", "Withdrawal", "/withdrawal" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-briefcase", "Programs", "/programs" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-education", "Colleges", "/colleges" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-th", "Sections", "/sections" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-tasks", "Blocks", "/blocks" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-arrow-up", "Levels", "/levels" ) ?>
		<?= MyWidgets::mainPanelButton("glyphicon glyphicon-th-large", "Divisions", "/divisions" ) ?>
		</center>
	</div>
</div>