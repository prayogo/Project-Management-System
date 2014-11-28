<?php
/* @var $this CompanyTypeController */
/* @var $data CompanyType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompanyType')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CompanyType), array('view', 'id'=>$data->CompanyTypeId)); ?>
	<br />

</div>