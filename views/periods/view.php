<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Periods */

$this->title = 'View Period';
$this->params['breadcrumbs'][] = ['label' => 'Periods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periods-view">

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
        <?php if(!$model->active) : ?>
            <?= Html::a('Activate', ['activate', 'id'=>$model->id], ['class'=>'btn btn-primary']) ?>
        <?php endif; ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shortName',
            'longName',
            'start',
            'end',
            ['label'=>'Period Type', 'value' => 'typeName'],
            ['label'=>'Status', 'value'=>$model->active?'Active':'Inactive'],
        ],
    ]) ?>

</div>
