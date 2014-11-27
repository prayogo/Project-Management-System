<?php
/* @var $this ConsultantController */
/* @var $data Consultant */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Name), array('view', 'id'=>$data->ConsultantId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LectureId')); ?>:</b>
	<?php echo CHtml::encode($data->LectureId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EmployeeId')); ?>:</b>
	<?php echo CHtml::encode($data->EmployeeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ResidentId')); ?>:</b>
	<?php echo CHtml::encode($data->ResidentId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CategoryId')); ?>:</b>
	<?php echo CHtml::encode($data->Category->Category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DepartmentId')); ?>:</b>
	<?php echo CHtml::encode($data->Department->Department); ?>
	<br />

</div>