<?php
/* @var $this CategoryController */
/* @var $data Category */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Category')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->Category), array('view', 'id'=>$data->CategoryId)); ?>
	<br />

</div>