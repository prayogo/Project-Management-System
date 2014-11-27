<?php
/* @var $this FacultyController */
/* @var $data Faculty */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('FacultyId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->FacultyId), array('view', 'id'=>$data->FacultyId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Code')); ?>:</b>
	<?php echo CHtml::encode($data->Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Faculty')); ?>:</b>
	<?php echo CHtml::encode($data->Faculty); ?>
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