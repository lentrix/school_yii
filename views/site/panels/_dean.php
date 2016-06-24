<?php 
use yii\helpers\Html;
use app\components\MyWidgets;
?>

<div class="panel panel-info">
	<div class="panel-heading">
		<span class="big">
			Dean/Chairman Panel
		</span>
	</div>
	<div class="panel-body">
		<center>
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-folder-open", "Class Offerings", "/classes" ) ?>
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-tasks", "Blocks", "/blocks" ) ?>
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-briefcase", "Teaching Load", "/teachers/load" ) ?>
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-th-list", "Study Load", "/students/load" ) ?>
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-list-alt", "Class List", "/classes/class-list" ) ?>
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-folder-close", "Courses", "/courses" ) ?>
		</center>
	</div>
</div>
