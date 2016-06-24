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
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-th-list", "Study Load", "/students/load" ) ?>
			<?= MyWidgets::mainPanelButton("glyphicon glyphicon-folder-close", "Courses", "/courses" ) ?>
		</center>
	</div>
</div>
