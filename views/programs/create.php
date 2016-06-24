<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Programs */

$this->title = 'Create Programs';
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
