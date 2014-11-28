<?php
/* @var $this CustomerController */
/* @var $model MsCustomer */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'customer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation' => true,
    'enableAjaxValidation' => true,
)); ?>

<div class="panel panel-default" id="customer-detail">

<div class="panel-body">
    <div class="form-horizontal" role="form">    
	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'Company', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'Company', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'CompanyTypeId', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'CompanyTypeId', array('class'=>'form-control CompanyTypeId')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'Address', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'Address', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'City', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'City', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'State', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'State', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'CountryId', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'CountryId', array('class'=>'form-control CountryId')); ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'DayOfJoin', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'DayOfJoin', array('class'=>'form-control Date')) ;?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'Phone', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'Phone', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'Fax', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'Fax', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'NPWP', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'NPWP', array('class'=>'form-control')) ;?>            
            </div>
        </div>

        <div class="form-group">
            <div class="col-1"><span class="pull-right"></span>
                <?php echo $form->labelEx($model,'Webpage', array('class'=>'control-label col-lg-2')); ?>
            </div>
            <div class="col-lg-6">
                <?php echo $form->textField($model,'Webpage', array('class'=>'form-control')) ;?>            
            </div>
        </div>
        <hr>            
    </div>

    <a class="" style="cursor:pointer;text-decoration:none;" id="btnAddContact"><i class="fi-plus"></i> Add New Contact Person</a>    
    <div id='contact_person' >
    <?php
        $index = 0;        
        foreach ($model->HContactPerson as $id => $HContactPersonForm):
            $this->renderPartial('contactperson', array(
                'model' => $HContactPersonForm,
                'index' => $id,
                'display' => 'block'
            ));
            $index++;
        endforeach;
    ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

		</div><!-- form -->
	</div>
</div>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.css">  
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2-bootstrap.css" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2/select2.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui/jquery-ui.min.js"></script>

<script>	
    <?php        
        Yii::app()->clientScript->registerScript('loadContact', '
        var _index = ' . $index . ';
        $("#btnAddContact").click(function(e){
            e.preventDefault();            
            $.ajax({
                url: "'. Yii::app()->request->baseUrl . '/customer/AddNewContact",
                data: { "index" : _index },
                dataType : "html",
                success:function(response){                    
                    $contact_person_clone =  $(response).find("#contact_person").clone().attr("id", "").attr("style","");
                    $contact_person_clone.appendTo("#contact_person");
                    console.log($contact_person_clone);
                }
            });
            _index++;
        });
    ', CClientScript::POS_END);
    ?>
</script>