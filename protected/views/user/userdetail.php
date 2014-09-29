<?php
/* @var $this UserDetailFormController */
/* @var $model UserDetailForm */
/* @var $form CActiveForm */
?>

<div class="panel panel-default">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-detail-form-userdetail-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div class="panel-body">
    <div class="form-horizontal" role="form">    
    
    <?php 
			$form->error($model,'Username');
        	$form->error($model,'Name'); 
			$form->error($model,'Email');
			$form->error($model,'Phone');
			$form->error($model,'Password');
			
		echo $form->errorSummary($model);
	?>
	<?php $model->UserId ?>
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->


	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model,'Username', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model,'Username', array('class'=>'form-control')); ?>        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model,'Name', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model,'Name', array('class'=>'form-control')); ?>        
        </div>
    </div>

    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model,'Email', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model,'Email', array('class'=>'form-control')); ?>        
        </div>
    </div>

    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model,'Phone', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model,'Phone', array('class'=>'form-control')); ?>        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model,'Password', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->PasswordField($model,'Password', array('class'=>'form-control')); ?>        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model,'Confirm_Password', array('class'=>'control-label col-lg-2')); ?>
    	</div>
        <div class="col-lg-6">
        	<?php echo $form->PasswordField($model,'Confirm_Password', array('class'=>'form-control')); ?>        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo $form->labelEx($model,'Copy_User', array('class'=>'control-label col-lg-2')); ?>
        </div>
		<div class="col-lg-6" style="margin-top:5px">
	        <?php echo $form->CheckBox($model,'Copy_User',array('class'=>'check','onclick'=>'enabled_form($(\'.check\'));')); ?>
		</div>
    </div>

    <div class="form-group enable_form" style="display:none;">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo $form->labelEx($model,'User', array('class'=>'control-label col-lg-2')); ?>
        </div>
		<div class="col-lg-6" style="margin-top:5px">	        
            <?php $this->widget('booster.widgets.TbSelect2', array('name' => 'User', 'data' => $data,'options' => array('placeholder' => '','width' => '100%',))); ?>
		</div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo $form->labelEx($model,'Enable', array('class'=>'control-label col-lg-2')); ?>
        </div>
		<div class="col-lg-6" style="margin-top:5px">
	        <?php echo $form->radioButtonList($model,'Enable', array('1'=>'Yes', '0'=>'No'), array('labelOptions'=>array('style'=>'margin-right:20px;'), 'separator'=>'')); ?>
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
	</div>
</div>

<script>
	function enabled_form(id){
		$('.enable_form').css('display', id.attr('checked') ? '' :'none');
	}
</script>

