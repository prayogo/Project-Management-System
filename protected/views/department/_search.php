<?php
/* @var $this DepartmentController */
/* @var $model Department */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'DepartmentId'); ?>
		<?php echo $form->textField($model,'DepartmentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Department'); ?>
		<?php echo $form->textField($model,'Department',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FacultyId'); ?>
		<?php echo $form->textField($model,'FacultyId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Enable'); ?>
		<?php echo $form->textField($model,'Enable',array('size'=>1,'maxlength'=>1)); ?>
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