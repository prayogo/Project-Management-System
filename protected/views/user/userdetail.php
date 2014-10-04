<?php
/* @var $this UserDetailFormController */
/* @var $model_detail UserDetailForm */
/* @var $form CActiveForm */
?>

<div class="panel panel-default">

<div class="panel-body">
    <div class="form-horizontal" role="form">    
    
	<?php echo $form->hiddenField($model_detail,'UserId') ?>
	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model_detail,'Username', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model_detail,'Username', array('class'=>'form-control', 'disabled' => (isset($model_detail->UserId) && $model_detail->UserId != "") ? 'disabled' : '')) ;?>
            <?php if(isset($model_detail->UserId) && $model_detail->UserId != "") echo $form->hiddenField($model_detail,'Username');?>
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model_detail,'Name', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model_detail,'Name', array('class'=>'form-control')); ?>        
        </div>
    </div>

    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model_detail,'Email', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model_detail,'Email', array('class'=>'form-control')); ?>        
        </div>
    </div>

    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model_detail,'Phone', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->textField($model_detail,'Phone', array('class'=>'form-control')); ?>        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model_detail,'Password', array('class'=>'control-label col-lg-2')); ?>
        </div>
        <div class="col-lg-6">
        	<?php echo $form->PasswordField($model_detail,'Password', array('class'=>'form-control')); ?>        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
        	<?php echo $form->labelEx($model_detail,'Confirm_Password', array('class'=>'control-label col-lg-2')); ?>
    	</div>
        <div class="col-lg-6">
        	<?php echo $form->PasswordField($model_detail,'Confirm_Password', array('class'=>'form-control')); ?>        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo $form->labelEx($model_detail,'Copy_User', array('class'=>'control-label col-lg-2')); ?>
        </div>
		<div class="col-lg-6" style="margin-top:5px">
	        <?php echo $form->CheckBox($model_detail,'Copy_User',array('class'=>'check','onchange'=>'enabled_form($(\'.check\'));')); ?>
		</div>
    </div>

    <div class="form-group enable_form" style="display:none;">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo $form->labelEx($model_detail,'User', array('class'=>'control-label col-lg-2')); ?>
        </div>
		<div class="col-lg-6" style="margin-top:5px">	        
            <?php echo $form->hiddenField($model_detail,'User', array('class'=>'User', 'style'=>'width:100%')); ?>
		</div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo $form->labelEx($model_detail,'Enable', array('class'=>'control-label col-lg-2')); ?>
        </div>
		<div class="col-lg-6" style="margin-top:5px">
	        <?php echo $form->radioButtonList($model_detail,'Enable', array('1'=>'Yes', '0'=>'No'), array('labelOptions'=>array('style'=>'margin-right:20px;'), 'separator'=>'')); ?>
		</div>
    </div>
    
	<div class="panel-footer">
		<div>
	        <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('um/user') ?>">
	           <i class="glyphicon glyphicon-remove" style="display:block;font-size:26px;"></i>Cancel
	        </a>
	        <button type="submit" class="btn btn-default pull-right">
	           <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
	        </button>
	    </div>
	</div>
    

		</div><!-- form -->
	</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2-bootstrap.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.js"></script>

<script>

	function enabled_form(id){
		$('.enable_form').css('display', id.attr('checked') ? '' :'none');
	}

    $('.check').change(enabled_form($('.check')));

    $(".User").select2({
        placeholder: '',
        query: function(query) {
            $.ajax({
                url: "<?php echo Yii::app()->request->baseUrl;?>/user/GetUserList", 
                data: { ajax: 1, userid: <?php echo (isset($model_detail->UserId) && $model_detail->UserId != "") ? $model_detail->UserId : 0 ?>, },
                dataType: 'json',
                type: "POST",
                success: function(data) {
                    var data1 = $.map(data, function (item) {
                        return {
                            text: item.Username,
                            id: item.UserId
                        }
                    });
                    query.callback({results: data1});
                }
            })
        },
        initSelection: function(element, callback) {
            var id = $(element).val();
            if(id !== "") {
                $.ajax("http://localhost/Project-Management-System/user/GetUserList", {
                    data: {id: id, ajax: 1, userid: <?php echo (isset($model_detail->UserId) && $model_detail->UserId != "") ? $model_detail->UserId : 0 ?>},
                    dataType: "json", type: "POST"
                }).done(function(data) {
                    if (data.length > 0){
                        callback({"text":data[0].Username});
                    }
                });
            }
        }
    });
</script>

