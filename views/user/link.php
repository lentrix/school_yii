<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Setup Link';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id'=>$model->id]];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-5">

	<h1><?= Html::encode($this->title) ?></h1>

	<table class="table table-bordered">
        <tr>
            <th>ID</th><td><?= $model->id; ?></td>
        </tr>
        <tr>
            <th>Username</th><td><?= $model->username; ?></td>
        </tr>
        <tr>
            <th>Role</th><td><?= $model->roleName; ?></td>
        </tr>
        <?php if($model->divisionId) : ?>
        <tr>
            <th>Division</th><td><?= $model->division->longName; ?></td>
        </tr>
        <?php endif; ?>
        <?php if($model->college): ?>
        <tr>
            <th>College</th><td><?= $model->college->longName; ?></td>
        </tr>
        <?php endif; ?>
    </table>

    <div>
    	<p>Select a <?= $model->roleName ?> to link to this user.</p>

    	<?php $form = ActiveForm::begin(); ?>

    	<?= $form->field($model, 'linkId')->dropDownList(
    		\yii\helpers\ArrayHelper::map($list, 'id', 'fullName'),
    		['prompt'=>'Select one', 'class'=>'form-control']
    	); ?>

    	<?= Html::submitButton('<i class="glyphicon glyphicon-link"></i> Link User', 
    		['class' => 'btn btn-primary']) ?>

    	<?php ActiveForm::end(); ?>
    </div>
</div>