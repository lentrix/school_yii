<?php 

use app\models\User;

$this->title = "SIS | Home";
$this->params['breadcrumbs'][] = '';

?>

<?php if(Yii::$app->user->identity->role===User::USER_ADMIN) : ?>
	<?= $this->render('panels/_admin') ?>
<?php endif; ?>

<?php if(Yii::$app->user->identity->role===User::USER_REGISTRAR) : ?>
	<?= $this->render('panels/_registrar') ?>
<?php endif; ?>

<?php if(Yii::$app->user->identity->role===User::USER_HEAD) : ?>
	<?= $this->render('panels/_dean') ?>
<?php endif; ?>

<?php if(Yii::$app->user->identity->role===User::USER_STUDENT) : ?>
	<?= $this->render('panels/_student') ?>
<?php endif; ?>



