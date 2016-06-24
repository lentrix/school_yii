<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Teachers */

$this->title = 'Teacher View - ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-10">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'lastName',
                'firstName',
                'salutation',
                'street',
                'city',
                'state',
                'phone',
                'specialty',
            ],
        ]) ?>
    </div>
    <div class="col-md-2">
        <p>
            <?= Html::a('Teaching Load', ['load', 'id'=>$model->id], ['class' => 'btn btn-info btn-block']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-block',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>
