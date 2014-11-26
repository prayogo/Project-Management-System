<?php
/* @var $this ConsultantController */
/* @var $data Consultant */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ConsultantId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ConsultantId), array('view', 'id'=>$data->ConsultantId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LectureId')); ?>:</b>
	<?php echo CHtml::encode($data->LectureId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmployeeId')); ?>:</b>
	<?php echo CHtml::encode($data->EmployeeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ResidentId')); ?>:</b>
	<?php echo CHtml::encode($data->ResidentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CategoryId')); ?>:</b>
	<?php echo CHtml::encode($data->CategoryId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepartmentId')); ?>:</b>
	<?php echo CHtml::encode($data->DepartmentId); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UserIn')); ?>:</b>
	<?php echo CHtml::encode($data->UserIn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateIn')); ?>:</b>
	<?php echo CHtml::encode($data->DateIn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserUp')); ?>:</b>
	<?php echo CHtml::encode($data->UserUp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DateUp')); ?>:</b>
	<?php echo CHtml::encode($data->DateUp); ?>
	<br />

	*/ ?>

</div>