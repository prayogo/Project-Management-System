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
       
        <?php echo $form->hiddenField($model,'MenuId') ?>
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
            <label class="control-label col-lg-2">Parent</label>
	        <div class="col-lg-6">
<?php echo $form->hiddenField($model,'ParentId', array('class'=>'ParentId', 'style'=>'width:100%')); ?>
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
        <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('um/menu') ?>">
            <i class="glyphicon glyphicon-remove" style="display:block;font-size:26px;"></i>Cancel
        </a>
        <button type="submit" class="btn btn-default pull-right">
            <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
        </button>
    </div>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2-bootstrap.css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.js"></script>

<script>
	$(".ParentId").select2({
		placeholder: '',
		query: function(query) {
			$.ajax({
				url: "http://localhost:8088/pms/menu/GetParentMenuList", 
				data: { ajax: 1, menuid: <?php echo $model->MenuId ?>, },
				dataType: 'json',
				type: "POST",
				success: function(data) {
					var data1 = $.map(data, function (item) {
						return {
							text: item.Caption,
							id: item.MenuId
						}
					});
					query.callback({results: data1});
				}
			})
		},
		initSelection: function(element, callback) {
            var id = $(element).val();
            if(id !== "") {
                $.ajax("http://localhost:8088/pms/menu/GetParentMenuList", {
                    data: {id: id, ajax: 1, menuid: <?php echo $model->MenuId ?>},
                    dataType: "json", type: "POST"
                }).done(function(data) {
                    callback({"text":data[0].Caption});
                });
            }
		}
	});
</script>