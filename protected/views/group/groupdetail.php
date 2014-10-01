<?php
/* @var $this GroupHeaderFormController */
/* @var $model_detail GroupHeaderForm */
/* @var $form CActiveForm */
?>

<div class="panel panel-default">

<?php 
/*	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'group-header-form-groupdetail-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); */
?>

<div class="panel-body">
    <div class="form-horizontal" role="form">    

	<?php echo $form->hiddenField($model_detail,'HGroupId') ?>
    
    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span></div>
        <?php echo $form->labelEx($model_detail,'Group', array('class'=>'control-label col-lg-2')); ?>
        <div class="col-lg-6">
        <?php echo $form->textField($model_detail,'Group', array('class'=>'form-control')); ?>
        
        </div>
    </div>

	<div class="form-group">
        <div class="col-1"><span class="pull-right"></span></div>
        <?php echo $form->labelEx($model_detail,'Description', array('class'=>'control-label col-lg-2')); ?>
        <div class="col-lg-6">
        <?php echo $form->textArea($model_detail,'Description', array('class'=>'form-control', 'rows'=>'5')); ?>
        
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span>
            <?php echo $form->labelEx($model_detail,'isCopyGroup', array('class'=>'control-label col-lg-2')); ?>
        </div>
		<div class="col-lg-6" style="margin-top:5px">
	        <?php echo $form->CheckBox($model_detail,'isCopyGroup',array('class'=>'check','onChange'=>'enabled_form($(\'.check\'));')); ?>
		</div>
    </div>
    
    <div class="form-group enable_form" style="display:none;">
        <div class="col-1"><span class="pull-right"></span></div>
        <?php echo $form->labelEx($model_detail,'GroupIdCopy', array('class'=>'control-label col-lg-2')); ?>
        <div class="col-lg-6">
<?php echo $form->hiddenField($model_detail,'GroupIdCopy', array('class'=>'GroupIdCopy', 'style'=>'width:100%')); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-1"><span class="pull-right"></span></div>
            <?php echo $form->labelEx($model_detail,'Enable', array('class'=>'control-label col-lg-2')); ?>
            <div class="col-lg-6" style="margin-top:5px">
            <?php echo $form->radioButtonList($model_detail,'Enable', array('1'=>'Yes', '0'=>'No'), 
                array('labelOptions'=>array('style'=>'margin-right:20px;'), 'separator'=>'')); ?>
        </div>
    </div>
    
    </div>
</div>
<div class="panel-footer">
	<div>
        <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('um/group') ?>">
            <i class="glyphicon glyphicon-remove" style="display:block;font-size:26px;"></i>Cancel
        </a>
        <button type="submit" class="btn btn-default pull-right">
            <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
        </button>
    </div>
</div>
<?php //$this->endWidget(); ?>
</div><!-- form -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2-bootstrap.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.js"></script>
<script>
	$(".GroupIdCopy").select2({
		placeholder: '',
		query: function(query) {
			$.ajax({
				url: '<?php echo Yii::app()->request->baseUrl;?>/group/GetGroupList', 
				data: { ajax: 1, groupid: <?php echo (isset($model_detail->HGroupId) && $model_detail->HGroupId != "") ? $model_detail->HGroupId : 0 ?>, },
				dataType: 'json',
				type: "POST",
				success: function(data) {
					var data1 = $.map(data, function (item) {
						return {
							text: item.Group,
							id: item.HGroupId
						}
					});
					query.callback({results: data1});
				}
			})
		},
		initSelection: function(element, callback) {
            var id = $(element).val();
            if(id !== "") {
                $.ajax("<?php echo Yii::app()->request->baseUrl;?>/group/GetGroupList", {
                    data: {copyid: id, ajax: 1, groupid: <?php echo (isset($model_detail->HGroupId) && $model_detail->HGroupId != "") ? $model_detail->HGroupId : 0 ?>},
                    dataType: "json", type: "POST"
                }).done(function(data) {
					if (data.length > 0){
                    	callback({"text":data[0].Group});
					}
                });
            }
		}
	});
	
	$('.check').change(enabled_form($('.check')));
	
	function enabled_form(id){
		if (id.attr('checked')){
			$(".GroupIdCopy").select2('val', 0);
		}
		$('.enable_form').css('display', id.attr('checked') ? '' :'none');
	}
</script>