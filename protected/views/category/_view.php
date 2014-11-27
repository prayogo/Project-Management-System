<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CategoryId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CategoryId), array('view', 'id'=>$data->CategoryId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Category')); ?>:</b>
	<?php echo CHtml::encode($data->Category); ?>
	<br />

</div>