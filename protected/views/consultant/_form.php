<?php
/* @var $this ConsultantController */
/* @var $model Consultant */
/* @var $form CActiveForm */
?>

<div class="form-horizontal">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'consultant-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Name', array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
			<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>250,'class'=>'form-control')); ?>
        </div>
		<?php echo $form->error($model,'Name'); ?>
	</div>
    
	<div class="form-group">
		<?php echo $form->labelEx($model,'LectureId', array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
		<?php echo $form->textField($model,'LectureId',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
        </div>
		<?php echo $form->error($model,'LectureId'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'EmployeeId', array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
		<?php echo $form->textField($model,'EmployeeId',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
        </div>
		<?php echo $form->error($model,'EmployeeId'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ResidentId', array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
		<?php echo $form->textField($model,'ResidentId',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
        </div>
		<?php echo $form->error($model,'ResidentId'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'CategoryId', array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
		<?php
			$this->widget('booster.widgets.TbSelect2',
				array(
					'model' => $model,
					'attribute' => 'CategoryId',
					'data' => CHtml::listData(Category::model()->findAll(), 'CategoryId', 'Category'),
					'options' => array(
						'placeholder' => 'Select Category',
						'width' => '100%',
					)
				)
			);
		?>
        </div>
		<?php echo $form->error($model,'CategoryId'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'DepartmentId', array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-9">
        <?php
			$this->widget('booster.widgets.TbSelect2',
				array(
					'model' => $model,
					'attribute' => 'DepartmentId',
					'data' => CHtml::listData(Department::model()->findAll(), 'DepartmentId', 'Department'),
					'options' => array(
						'placeholder' => 'Select Category',
						'width' => '100%',
					)
				)
			);
		?>
        </div>
		<?php echo $form->error($model,'DepartmentId'); ?>
	</div>
	
    <div class="form-group">
        <label class="col-sm-3 control-label">Emails</label>
        <div class="col-sm-9" id="email">
            <?php
            $index = 0;
            foreach ($model->ConsultantEmail as $id => $child):
                $this->renderPartial('email/_form', array(
                    'model' => $child,
                    'index' => $id,
                    'display' => 'block'
                ));
                $index++;
            endforeach;
            ?>
        </div>
        
        <span class="col-sm-3 control-label"></span>
        <div class="col-sm-9" style="margin-top:-3px">
            <div id="loadEmailByAjax">Add Email</div>
        </div>
    </div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<style>
	#loadEmailByAjax{
		background-color:rgb(183, 214, 231); 
		text-align:center; 
		padding-top:2px; 
		padding-bottom:2px; 
		font-size:12px;
        vertical-align:middle; 
		color:#298dcd; 
		font-weight:bold;
		cursor:pointer;
		-moz-user-select: none; 
		-webkit-user-select: none; 
		-ms-user-select:none; 
		user-select:none;
	}
	#loadEmailByAjax:hover{
		background-color:rgb(126, 182, 213); 
		color:white;
	}
	
	.close{
		font-size:20px;	
		margin-top: -8px;
		margin-right: -8px;
	}
</style>
<?php
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScript('loademail', '
var _index = ' . $index . ';
$("#loadEmailByAjax").click(function(e){
    e.preventDefault();
    var _url = "' . Yii::app()->controller->createUrl("loadEmailByAjax") . '?index="+_index;
    $.ajax({
        url: _url,
        success:function(response){
            $("#email").append(response);
            $("#email .crow").last().animate({
                opacity : 1, 
                left: "+50", 
                height: "toggle"
            });
        }
    });
    _index++;
});
', CClientScript::POS_END);
?>