<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = 'Student Info';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <h1>
        <span class="pull-right">
            <?= Html::a('<i class="glyphicon glyphicon-arrow-right"></i> Proceed to Enrolment',
            ['/enrolment/program', 'id'=>$model->id],
            ['class'=>'btn btn-primary btn-lg'] ); ?>
        </span>
        <?= Html::encode($this->title) ?>
    </h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'lastName',
            'firstName',
            'middleName',
            'birthDate',
            'gender',
            'status',
            'street',
            'city',
            'state',
            'citizen',
            'religion',
            'father',
            'mother',
            'phone',
            'userId',
        ],
    ]) ?>

</div>
