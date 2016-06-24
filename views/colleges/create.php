<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Colleges */

$this->title = 'Create Colleges';
$this->params['breadcrumbs'][] = ['label' => 'Colleges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colleges-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
