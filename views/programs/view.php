<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Programs */

$this->title = $model->shortName;
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class='table table-striped table-bordered'>
        <tr>
            <th>ID</th>
            <td><?= $model->id ?></td>
        </tr>
        <tr>
            <th>Short Name</th>
            <td><?= $model->shortName ?></td>
        </tr>
        <tr>
            <th>Long Name</th>
            <td><?= $model->longName ?></td>
        </tr>
        <tr>
            <th>Major</th>
            <td><?= $model->major ?></td>
        </tr>
        <?php if($model->college) : ?>
        <tr>
            <th>College</th>
            <td><?= $model->college->shortName ?></td>
        </tr>
        <?php endif; ?>
        <?php if($model->track) : ?>
        <tr>
            <th>Track</th>
            <td><?= $model->track ?></td>
        </tr>
        <?php endif; ?>
    </table>

</div>
