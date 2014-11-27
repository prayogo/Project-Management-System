<?php
/* @var $this ConsultantController */
/* @var $model Consultant */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'consultant-form',
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
		<?php echo $form->labelEx($model,'LectureId'); ?>
		<?php echo $form->textField($model,'LectureId',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'LectureId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EmployeeId'); ?>
		<?php echo $form->textField($model,'EmployeeId',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'EmployeeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ResidentId'); ?>
		<?php echo $form->textField($model,'ResidentId',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ResidentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CategoryId'); ?>
		<?php
			$this->widget('booster.widgets.TbSelect2',
				array(
					'model' => $model,
					'attribute' => 'CategoryId',
					'data' => CHtml::listData(Category::model()->findAll(), 'CategoryId', 'Category'),
					'options' => array(
						'placeholder' => 'Select Category',
						'width' => '40%',
					)
				)
			);
		?>
		<?php echo $form->error($model,'CategoryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DepartmentId'); ?>
        <?php
			$this->widget('booster.widgets.TbSelect2',
				array(
					'model' => $model,
					'attribute' => 'DepartmentId',
					'data' => CHtml::listData(Department::model()->findAll(), 'DepartmentId', 'Department'),
					'options' => array(
						'placeholder' => 'Select Category',
						'width' => '40%',
					)
				)
			);
		?>
		<?php echo $form->error($model,'DepartmentId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->