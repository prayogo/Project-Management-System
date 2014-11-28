<?php
/* @var $this ConsultantController */
/* @var $data Consultant */
?>

<div class="view">
<div class="row">
	<b><span class="col-md-3"><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?></span>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Name), array('view', 'id'=>$data->ConsultantId)); ?>
	<br />

	<b><span class="col-md-3"><?php echo CHtml::encode($data->getAttributeLabel('LectureId')); ?></span>:</b>
	<?php echo CHtml::encode($data->LectureId); ?>
	<br />

	<b><span class="col-md-3"><?php echo CHtml::encode($data->getAttributeLabel('EmployeeId')); ?></span>:</b>
	<?php echo CHtml::encode($data->EmployeeId); ?>
	<br />

	<b><span class="col-md-3"><?php echo CHtml::encode($data->getAttributeLabel('ResidentId')); ?></span>:</b>
	<?php echo CHtml::encode($data->ResidentId); ?>
	<br />

	<b><span class="col-md-3"><?php echo CHtml::encode($data->getAttributeLabel('CategoryId')); ?></span>:</b>
	<?php echo CHtml::encode($data->Category->Category); ?>
	<br />

	<b><span class="col-md-3"><?php echo CHtml::encode($data->getAttributeLabel('DepartmentId')); ?></span>:</b>
	<?php echo CHtml::encode($data->Department->Department); ?>
	<br />
    
    <b><span class="col-md-3">Email</span>:</b>
    <?php 
		$str = $data->gridConsultantEmail();
		if (strlen($str) > StandardVariable::CONSTANT_VIEW_MAX_LENGTH){
			$str = substr($str, 0, StandardVariable::CONSTANT_VIEW_MAX_LENGTH - 3) . '...';
		}
		echo $str;?>
</div>
</div>