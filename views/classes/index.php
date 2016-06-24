<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClassesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Classes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>ID</td>
                <th>Course Name</th>
                <th>Description</th>
                <th class='center'>Pay Units</th>
                <th class='center'>Credit Units</th>
                <th>Schedule</th>
                <th class='center'>Max</th>
                <th class='center'>Density</th>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach($classes as $class) : ?>
            <tr>
                <td><?= Html::a( sprintf('%08d', $class->id), ['view', 'id'=>$class->id]) ?></td>
                <td><?= $class->course->name ?></td>
                <td><?= $class->course->description ?></td>
                <td class='center'><?= $class->payUnits ?></td>
                <td class='center'><?= $class->creditUnits ?></td>
                <td><?= $class->scheduleString ?></td>
                <td class='center'><?= $class->max ?></td>
                <td class='center'><?= $class->density ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>

</div>
