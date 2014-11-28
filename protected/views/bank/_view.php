<?php
/* @var $this BankController */
/* @var $data Bank */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Name), array('view', 'id'=>$data->BankId)); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('ShortDescr')); ?>:</b>
	<?php echo CHtml::encode($data->ShortDescr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BankCode')); ?>:</b>
	<?php echo CHtml::encode($data->BankCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BranchCode')); ?>:</b>
	<?php echo CHtml::encode($data->BranchCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SwiftCode')); ?>:</b>
	<?php echo CHtml::encode($data->SwiftCode); ?>
	<br />

</div>