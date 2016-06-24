<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Levels */

$this->title = 'Create Levels';
$this->params['breadcrumbs'][] = ['label' => 'Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="levels-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
