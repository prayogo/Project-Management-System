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
		<?php echo $form->label($model,'ConsultantId'); ?>
		<?php echo $form->textField($model,'ConsultantId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LectureId'); ?>
		<?php echo $form->textField($model,'LectureId',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EmployeeId'); ?>
		<?php echo $form->textField($model,'EmployeeId',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ResidentId'); ?>
		<?php echo $form->textField($model,'ResidentId',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CategoryId'); ?>
		<?php echo $form->textField($model,'CategoryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DepartmentId'); ?>
		<?php echo $form->textField($model,'DepartmentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserIn'); ?>
		<?php echo $form->textField($model,'UserIn',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateIn'); ?>
		<?php echo $form->textField($model,'DateIn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserUp'); ?>
		<?php echo $form->textField($model,'UserUp',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DateUp'); ?>
		<?php echo $form->textField($model,'DateUp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->