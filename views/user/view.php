<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'View User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
        <?= Html::a('Setup Link', ['link', 'id'=> $model->id], 
            ['class' => 'btn btn-success']
        ) ?>
    </p>

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

</div>

