<?php
/* @var $this ConsultantEmailController */
/* @var $model ConsultantEmail */
/* @var $form CActiveForm */
?>
<div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']Email'); ?>
		<?php echo CHtml::activeTextField($model,'[' . $index . ']Email',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']Email'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']Primary'); ?>
		<?php echo CHtml::activeRadioButtonList($model,'[' . $index . ']Primary',array('1'=>'Yes', '0'=>'No'),array('size'=>1,'maxlength'=>1)); ?>
		<?php echo CHtml::error($model,'[' . $index . ']Primary'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::link('Delete', '#', array('onclick' => 'deleteEmail(this, ' . $index . '); return false;')); ?>
	</div>

</div>

<?php
Yii::app()->clientScript->registerScript('deleteEmail', "
function deleteEmail(elm, index)
{
    element=$(elm).parent().parent();
    /* animate div */
    $(element).animate(
    {
        opacity: 0.25, 
        left: '+=50', 
        height: 'toggle'
    }, 400,
    function() {
        /* remove div */
        $(element).remove();
    });
}", CClientScript::POS_END);