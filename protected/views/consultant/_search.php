<?php
/* @var $this ConsultantController */
/* @var $model Consultant */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LectureId'); ?>
		<?php echo $form->textField($model,'LectureId',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmployeeId'); ?>
		<?php echo $form->textField($model,'EmployeeId',array('size'=>15,'maxlength'=>15)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'ResidentId'); ?>
		<?php echo $form->textField($model,'ResidentId',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'varCategory'); ?>
		<?php echo $form->textField($model,'varCategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DepartmentId'); ?>
		<?php echo $form->textField($model,'DepartmentId'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->