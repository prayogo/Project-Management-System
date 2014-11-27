<?php
/* @var $this FacultyController */
/* @var $model Faculty */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'faculty-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Code'); ?>
		<?php echo $form->textField($model,'Code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Faculty'); ?>
		<?php echo $form->textField($model,'Faculty',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Faculty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Enable'); ?>
		<?php echo $form->radioButtonList($model,'Enable',array('1'=>'Enable','0'=>'Disable'),array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'Enable'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->