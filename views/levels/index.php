<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LevelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Levels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="levels-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Levels', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shortName',
            'longName',
            ['label'=>'Division','value' => 'division.longName'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
