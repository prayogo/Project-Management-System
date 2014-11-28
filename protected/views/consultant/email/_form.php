<?php
/* @var $this ConsultantEmailController */
/* @var $model ConsultantEmail */
/* @var $form CActiveForm */
?>
<div class="emailPartial">
<div class="panel panel-default">
	<div class="panel-heading" style="height:25px">
    	<span style="font-size: 13px; font-weight: bold; margin-top: -6px; display: inline-block; width: 200px;">Consultant Email</span>
		<?php echo 
			'<button type="button" class="close" onclick="deleteEmail(this, ' . $index . '); return false;">
				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'; 
		?>
	</div>
  <div class="panel-body">    
	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']Email', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-9">
		<?php echo CHtml::activeTextField($model,'[' . $index . ']Email',array('size'=>60,'maxlength'=>250,'class'=>'form-control')); ?>
        </div>
		<?php echo CHtml::error($model,'[' . $index . ']Email'); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabelEx($model,'[' . $index . ']Primary', array('class'=>'col-sm-2 control-label')); ?>
        <div class="col-sm-9" style="margin-top:7px">
		<?php echo CHtml::activeRadioButtonList($model,'[' . $index . ']Primary',array('1'=>'Yes', '0'=>'No'),
			array('labelOptions'=>array('style'=>'margin-right:20px;display:inline;'), 'separator'=>'')); ?>
		</div>
		<?php echo CHtml::error($model,'[' . $index . ']Primary'); ?>
	</div>
</div>
</div>
</div>
<?php
Yii::app()->clientScript->registerScript('deleteEmail', "
function deleteEmail(elm, index)
{
    element=$(elm).closest('.emailPartial');
	console.log(element);
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