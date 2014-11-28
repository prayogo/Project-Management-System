<?php
/* @var $this CountryController */
/* @var $data Country */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Country')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Country), array('view', 'id'=>$data->CountryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISO2')); ?>:</b>
	<?php echo CHtml::encode($data->ISO2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISO3')); ?>:</b>
	<?php echo CHtml::encode($data->ISO3); ?>
	<br />

</div>