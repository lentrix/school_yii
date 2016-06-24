<?php

use yii\helpers\Html;
use yii\bootstrap\Dropdown;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */

$this->title = 'Teacher\'s Load';
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
	<div class='pull-right'>
		<span class="dropdown">
			<?php $teachers = [] ?>
			<?php foreach(\app\models\Teachers::find()->orderBy('lastName')->all() as $teacher) : ?>
				<?php $teachers[] = [
					'label' => $teacher->fullName,
					'url'   => [
						'load', 'id'=>$teacher->id,
						'periodId' => $periodId
					],
				] ?>
			<?php endforeach; ?>
			<a href="#" data-toggle="dropdown" class="dropdown-toggle">Select a Teacher <b class="caret"></b></a>
		    <?php
		        echo Dropdown::widget([
		            'items' => $teachers,
		        ]);
		    ?>

		</span>
	</div>
	<h1>
		<?= $this->title; ?>
	</h1>
</div>
<?php if (!$periodId): ?>
	<?php foreach(\app\models\Periods::find()->andFilterWhere(['active'=>true])->all() as $period) : ?>
		<?= $this->render('_load', ['id'=>$id, 'periodId'=>$period->id]); ?>
	<?php endforeach; ?>
<?php else: ?>
	<?= $this->render('_load', ['id'=>$id, 'periodId'=>$periodId]); ?>
<?php endif ?>
	