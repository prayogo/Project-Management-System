<?php
/* @var $this UserDetailFormController */
/* @var $model UserDetailForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-detail-form-userdetail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Username'); ?>
		<?php echo $form->textField($model,'Username'); ?>
		<?php echo $form->error($model,'Username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name'); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email'); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone'); ?>
		<?php echo $form->error($model,'Phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->textField($model,'Password'); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserIn'); ?>
		<?php echo $form->textField($model,'UserIn'); ?>
		<?php echo $form->error($model,'UserIn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserUp'); ?>
		<?php echo $form->textField($model,'UserUp'); ?>
		<?php echo $form->error($model,'UserUp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Enable'); ?>
		<?php echo $form->textField($model,'Enable'); ?>
		<?php echo $form->error($model,'Enable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateIn'); ?>
		<?php echo $form->textField($model,'DateIn'); ?>
		<?php echo $form->error($model,'DateIn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateUp'); ?>
		<?php echo $form->textField($model,'DateUp'); ?>
		<?php echo $form->error($model,'DateUp'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->