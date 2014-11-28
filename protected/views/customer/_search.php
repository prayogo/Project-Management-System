<?php
/* @var $this CustomerController */
/* @var $model CustomerForm */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'CustomerId'); ?>
		<?php echo $form->textField($model,'CustomerId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Company'); ?>
		<?php echo $form->textField($model,'Company',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DayOfJoin'); ?>
		<?php echo $form->textField($model,'DayOfJoin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NPWP'); ?>
		<?php echo $form->textField($model,'NPWP',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fax'); ?>
		<?php echo $form->textField($model,'Fax',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Address'); ?>
		<?php echo $form->textField($model,'Address',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'City'); ?>
		<?php echo $form->textField($model,'City',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'State'); ?>
		<?php echo $form->textField($model,'State',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CompanyTypeId'); ?>
		<?php echo $form->textField($model,'CompanyTypeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CountryId'); ?>
		<?php echo $form->textField($model,'CountryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Webpage'); ?>
		<?php echo $form->textField($model,'Webpage',array('size'=>60,'maxlength'=>250)); ?>
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