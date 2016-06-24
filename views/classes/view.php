<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use app\models\User;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = $model->course->name;
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $user = Yii::$app->user->identity; ?>

<div class="classes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if($model->userId===$user->id || Yii::$app->user->identity->role===User::USER_ADMIN): ?>
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
    <?php endif; ?>

    <table class='table table-bordered table-striped table-condensed'>
        <tr>
            <th>Course</th>
            <td><?= $model->course->fullDetails; ?></td>
        </tr>
        <tr>
            <th>Teacher</th>
            <td><?= $model->teacher->fullName; ?></td>
        </tr>
        <tr>
            <th>Pay Units</th>
            <td><?= $model->payUnits; ?></td>
        </tr>
        <tr>
            <th>Credit Units</th>
            <td><?= $model->creditUnits; ?></td>
        </tr>
        <tr>
            <th>Period</th>
            <td><?= $model->period->longName; ?></td>
        </tr>
        <?php if($model->user->collegeId) : ?>
        <tr>
            <th>College</th>
            <td><?= $model->user->college->longName; ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <th>Owner</th>
            <td><?= $model->user->username ?></td>
        </tr>
        <tr>
            <th>Max</th>
            <td><?= $model->max ?></td>
        </tr>
    </table>
    
    <div class='row'>
        <?php if(($user->id===$model->userId) || $user->role===User::USER_ADMIN): ?>
        <div class='col-md-3 pull-right'>
            <div class="dim-block">
            <h3>Add Time</h3>
            
            <?php $form = ActiveForm::begin(); ?>
                
                <?= $form->field($sched, 'start')->widget(DateTimePicker::className(), [
                    'language' => 'en',
                    'size' => 'ms',
                    'template' => '{input}',
                    'pickButtonIcon' => 'glyphicon glyphicon-time',
                    'inline' => false,
                    'clientOptions' => [
                        'startView' => 1,
                        'minView' => 0,
                        'maxView' => 1,
                        'autoclose' => true,
                        //'linkFormat' => 'HH:ii P', // if inline = true
                        'format' => 'h:ii', // if inline = false
                        'todayBtn' => true
                    ]
                ]);?>

                <?= $form->field($sched, 'end')->widget(DateTimePicker::className(), [
                    'language' => 'en',
                    'size' => 'ms',
                    'template' => '{input}',
                    'pickButtonIcon' => 'glyphicon glyphicon-time',
                    'inline' => false,
                    'clientOptions' => [
                        'startView' => 1,
                        'minView' => 0,
                        'maxView' => 1,
                        'autoclose' => true,
                        //'linkFormat' => 'HH:ii P', // if inline = true
                        'format' => 'h:ii', // if inline = false
                        'todayBtn' => true
                    ]
                ]);?>

                <?= $form->field($sched, 'days')->textInput(); ?>                

                <?= $form->field($sched, 'venueId')->dropDownList(
                    \yii\helpers\ArrayHelper::map(\app\models\Venues::find()
                        ->orderBy('name')->all(), 'id', 'name'),
                    ['prompt' => 'Select a venue']
                ); ?>

                <?= $form->field($sched, 'classId')->hiddenInput(['value'=>$model->id])->label(false); ?>                                

                <div class="form-group">
                    <?= Html::submitButton('Add Time', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-md-9">
            <h3>Time Schedule</h3>
            <?php if($conflict) : ?>
                <div class="error-message">
                    <?php $conflictSched = \app\models\Schedules::findOne(['id'=>$conflict]); ?>
                    <p>
                        The time schedule you entered is in conflict with: <br />
                        <strong>[ID: <?= $conflictSched->class->id; ?>] </strong>
                        <strong>Course: </strong> <?= $conflictSched->class->course->name ?> - 
                        <?= $conflictSched->class->course->description; ?><br />
                        <strong>Time:</strong> <?= $conflictSched->class->scheduleString; ?><br />
                        <strong>Teacher:</strong> <?= $conflictSched->class->teacher->fullName; ?>
                    </p>
                </div>
            <?php endif; ?>
            <table class='table table-bordered table-condensed table-striped'>
                <tr>
                    <th>Start</th>
                    <th>End</th>
                    <th>Days</th>
                    <th>Venue</th>
                </tr>
                <?php foreach($model->schedules as $s) : ?>
                <tr>
                    <td><?= date('h:i', strtotime($s->start)) ?></td>
                    <td><?= date('h:i', strtotime($s->end)) ?></td>
                    <td><?= $s->days ?></td>
                    <td>
                        <?php if(($user->id===$model->userId) || $user->role===User::USER_ADMIN): ?>
                        <div class='pull-right'>
                            <?= Html::a('<i class="glyphicon glyphicon-remove"></i>', 
                               ['delete-time', 'scheduleId' => $s->id, 'classId'=>$model->id], [
                                'class' => 'btn btn-danger btn-xs',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </div>
                        <?php endif; ?>
                        <?= $s->venue->name ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="col-md-9">
            <h3>Students Enrolled</h3>
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID#</th>
                        <th>Name</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                <?php $n=1; ?>
                <?php foreach($model->activeClassesEnrolleds as $classEnrolled) : ?>
                    <tr>
                        <td><?= $n++; ?>.</td>
                        <td>
                            <?= Html::a(sprintf("%06d",$classEnrolled->enrol->student->id),
                                ['students/load', 'enrolId'=>$classEnrolled->enrol->id]) ?>
                        </td>
                        <td><?= $classEnrolled->enrol->student->fullName ?></td>
                        <td><?= $classEnrolled->enrol->levelStr ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
