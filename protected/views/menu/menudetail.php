<?php
/* @var $this MenuController */
/* @var $model MenuDetailForm */
/* @var $form CActiveForm */

?>

<div class="panel panel-default">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-detail-form-menudetail-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div class="panel-body">
    <div class="form-horizontal" role="form">    
    	
        <?php 
			$form->error($model,'Caption');
        	$form->error($model,'Description'); 
			$form->error($model,'Link');
			$form->error($model,'IconCSS');
			
		echo $form->errorSummary($model);
		?>
        <?php $model->MenuId ?>
        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span></div>
            <?php echo $form->labelEx($model,'Caption', array('class'=>'control-label col-lg-2')); ?>
            <div class="col-lg-6">
            <?php echo $form->textField($model,'Caption', array('class'=>'form-control')); ?>
            
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span></div>
            <?php echo $form->labelEx($model,'Description', array('class'=>'control-label col-lg-2')); ?>
            <div class="col-lg-6">
            <?php echo $form->textArea($model,'Description', array('class'=>'form-control', 'rows'=>'5')); ?>
            
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span></div>
            <?php echo $form->labelEx($model,'Link', array('class'=>'control-label col-lg-2')); ?>
            <div class="col-lg-6">
            <?php echo $form->textField($model,'Link', array('class'=>'form-control')); ?>
           
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span></div>
            <?php echo $form->labelEx($model,'IconCSS', array('class'=>'control-label col-lg-2')); ?>
            <div class="col-lg-6">
            <?php echo $form->textField($model,'IconCSS', array('class'=>'form-control')); ?>
           
            </div>
        </div>
        
   		<div class="form-group">
			<div class="col-1"><span class="pull-right"></span></div>
            	<?php echo $form->labelEx($model,'Enable', array('class'=>'control-label col-lg-2')); ?>
				<div class="col-lg-6" style="margin-top:5px">
                <?php echo $form->radioButtonList($model,'Enable', array('1'=>'Yes', '0'=>'No'), 
					array('labelOptions'=>array('style'=>'margin-right:20px;'), 'separator'=>'')); ?>
			</div>
		</div>
    </div>
</div>
<div class="panel-footer">
	<div>
        <button class="btn btn-default">
            <i class="glyphicon glyphicon-remove" style="display:block;font-size:26px;"></i>Cancel
        </button>
        <button type="submit" class="btn btn-default pull-right">
            <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
        </button>
    </div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->