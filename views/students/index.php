<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lastName',
            'firstName',
            'middleName',
            'birthDate',
            // 'gender',
            // 'status',
            // 'street',
            // 'city',
            // 'state',
            // 'citizen',
            // 'religion',
            // 'father',
            // 'mother',
            // 'phone',
            // 'userId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
