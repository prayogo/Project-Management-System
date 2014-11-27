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
		<?php echo $form->label($model,'Code'); ?>
		<?php echo $form->textField($model,'Code',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Department'); ?>
		<?php echo $form->textField($model,'Department',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'varFaculty'); ?>
		<?php echo $form->textField($model,'varFaculty',array('size'=>60,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'varEnable'); ?>
		<?php echo $form->textField($model,'varEnable',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->