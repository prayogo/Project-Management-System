<?php
/* @var $this BankController */
/* @var $model Bank */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bank-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'ShortDescr'); ?>
		<?php echo $form->textField($model,'ShortDescr',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ShortDescr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BankCode'); ?>
		<?php echo $form->textField($model,'BankCode',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'BankCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BranchCode'); ?>
		<?php echo $form->textField($model,'BranchCode',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'BranchCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SwiftCode'); ?>
		<?php echo $form->textField($model,'SwiftCode',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'SwiftCode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->