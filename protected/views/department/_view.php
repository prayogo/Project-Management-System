<?php
/* @var $this DepartmentController */
/* @var $data Department */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('Code')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Code), array('view', 'id'=>$data->DepartmentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Department')); ?>:</b>
	<?php echo CHtml::encode($data->Department); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FacultyId')); ?>:</b>
	<?php echo CHtml::encode($data->Faculty->Faculty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Enable')); ?>:</b>
	<?php echo CHtml::encode($data->EnableText); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DateUp')); ?>:</b>
	<?php echo CHtml::encode($data->DateUp); ?>
	<br />

	*/ ?>

</div>