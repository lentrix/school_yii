<script type="text/javascript">
	function proceed() {
		var idNumber = document.getElementById('idNumber').value;
		window.location.href='index.php?r=enrolment/program&id=' + idNumber;
	}

	function proceedSelect() {
		var select = document.getElementById('selectStudent');
		var idNumber = select.options[select.selectedIndex].value;
		window.location.href='index.php?r=enrolment/program&id=' + idNumber;	
	}
</script>

<?php
/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Enrolment Process - Phase 1';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Enrolment Process</h1>

<p><strong>Phase 1</strong> Select a student from the list. Record a new student.</p>

<div class='row'>
	<div class="col-md-6">
		<div class='panel panel-success'>
			<div class='panel-heading'>
				<span class="big">Select a student</span>
			</div>
			<div class='panel-body'>
				<p>
					Select from among the previously enrolled students. You may search for a student's name
					by typing in the box the name of the student.
				</p>
				<div class='row'>
					<div class='col-md-8'>
						<?php $students = \app\models\Students::find()->orderBy('lastname, firstName')->all(); ?>
						<select class="form-control" id="selectStudent">
							<option value="0">Select a student</option>
						<?php foreach($students as $stud): ?>
							<option value="<?= $stud->id; ?>">
								<?= $stud->fullName; ?>
							</option>
						<?php endforeach; ?>

						</select>
					</div>
					<div class='col-md-4'>
						<button class='btn btn-primary btn-block' onclick="proceedSelect()">
							<i class="glyphicon glyphicon-arrow-right"></i>
							Proceed
						</button>
					</div>
				</div>
						
				<br />
				<p>
					You may also type the ID number of the student and click Proceed.
				</p>
				<div class="row">
					<div class='col-sm-8'>
						<input type="text" id="idNumber" class="form-control" />
					</div>
					<div class='col-sm-4'>
						<button class="btn btn-primary btn-block" onclick="proceed()">
							<i class="glyphicon glyphicon-arrow-right"></i> 
							Proceed
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class='panel panel-info'>
			<div class='panel-heading'>
				<span class="big">Record a new student</span>
			</div>
			<div class='panel-body'>
				<p>
					If the student in not found in the list, you may
					create a new student record by clicking on the 
					New Student button below.
					<div class='center'>
						<?=Html::a('<i class="glyphicon glyphicon-plus-sign"></i> New Student', 
						['/students/create'], ['class'=>'btn btn-primary btn-lg']); ?>
					</div>
				</p>
			</div>
		</div>
	</div>
</div>


