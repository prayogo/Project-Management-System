<?php
/* @var $this CustomerController */
/* @var $data CustomerForm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CustomerId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CustomerId), array('view', 'id'=>$data->CustomerId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Company')); ?>:</b>
	<?php echo CHtml::encode($data->Company); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DayOfJoin')); ?>:</b>
	<?php echo CHtml::encode($data->DayOfJoin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NPWP')); ?>:</b>
	<?php echo CHtml::encode($data->NPWP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Phone')); ?>:</b>
	<?php echo CHtml::encode($data->Phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fax')); ?>:</b>
	<?php echo CHtml::encode($data->Fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('City')); ?>:</b>
	<?php echo CHtml::encode($data->City); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('State')); ?>:</b>
	<?php echo CHtml::encode($data->State); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompanyTypeId')); ?>:</b>
	<?php echo CHtml::encode($data->CompanyTypeId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryId')); ?>:</b>
	<?php echo CHtml::encode($data->CountryId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Webpage')); ?>:</b>
	<?php echo CHtml::encode($data->Webpage); ?>
	<br />

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