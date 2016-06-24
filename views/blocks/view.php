<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blocks */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
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

        
<table class="table table-bordered table-striped">
    <tr>
        <th>Block Name</th>
        <th>Level</th>
        <th>Period</th>
        <th>Owner</th>
    </tr>
    <tr>
        <td><?= $model->name ?></td>
        <td><?= $model->level->longName ?></td>
        <td><?= $model->period->longName ?></td>
        <td><?= $model->user->username ?></td>
    </tr>
</table>

<?php if($msg) : ?>
    <div class='error-message'>
        <?= $msg ?>
    </div>
<?php endif; ?>

<div class='panel panel-primary'>
    <div class='panel-heading'>
        <span class='medium'>Schedule</span>
    </div>
    <div class='panel-body'>
        <table class="table table-bordered table-striped table-condensed">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Units</th>
                    <th>Schedule</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($model->blockClasses as $bc) : ?>
                <tr>
                    <td><?= $bc->class->course->name ?></td>
                    <td><?= $bc->class->course->description ?></td>
                    <td><?= $bc->class->creditUnits ?></td>
                    <td><?= $bc->class->scheduleString ?></td>
                    <td>
                        <span class='pull-right'>
                            <?= Html::a('<i class="glyphicon glyphicon-remove"></i>',
                                ['remove-class', 'blockClassId'=>$bc->id],
                                [
                                    'class'=>'btn btn-danger btn-xs', 
                                    'data' => [
                                        'method'=>'post',
                                        'confirm'=>'You are about to remove ' . $bc->class->course->name
                                    ],
                                ]
                            ); ?>
                        </span>
                        <?= $bc->class->teacher->fullName ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<hr />
<div>
    <h3>Classes for <?= $model->level->longName ?></h3>
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>Course</th>
                <th>Description</th>
                <th>Units</th>
                <th>Schedule</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($classesInLevel as $class) : ?>
            <tr>
                <td><?= $class->course->name ?></td>
                <td><?= $class->course->description ?></td>
                <td><?= $class->creditUnits ?></td>
                <td><?= $class->scheduleString ?></td>
                <td>
                    <span class='pull-right'>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>',
                            ['add-class', 'classId'=>$class->id, 'blockId'=>$model->id],
                            [
                                'class'=>'btn btn-success btn-xs', 
                                'data' => [
                                    'method'=>'post'
                                ],
                            ]
                        ); ?>
                    </span>
                    <?= $class->teacher->fullName ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<hr />
<div>
    <h3>Classes for <?= $model->level->longName ?></h3>
    <table class="table table-bordered table-striped table-condensed">
        <thead>
            <tr>
                <th>Course</th>
                <th>Description</th>
                <th>Units</th>
                <th>Schedule</th>
                <th>Teacher</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($classesInDivision as $class) : ?>
            <tr>
                <td><?= $class->course->name ?></td>
                <td><?= $class->course->description ?></td>
                <td><?= $class->creditUnits ?></td>
                <td><?= $class->scheduleString ?></td>
                <td>
                    <span class='pull-right'>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>',
                            ['add-class', 'classId'=>$class->id, 'blockId'=>$model->id],
                            [
                                'class'=>'btn btn-success btn-xs', 
                                'data' => [
                                    'method'=>'post'
                                ],
                            ]
                        ); ?>
                    </span>
                    <?= $class->teacher->fullName ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
