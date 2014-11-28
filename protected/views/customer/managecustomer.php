<?php
/* @var $this CustomerController */

$this->breadcrumbs=array(
  'pms'=>array('/pms'),
  'Customer',
);
?>

<h1 class="blok"><i class="fi-torso-business"></i> Manage Customer</h1>
<div>  
  <div class="metro">
  <?php 
    $form=$this->beginWidget('CActiveForm', array(
      'id'=>'customer-form-customerdetail-form',
      'enableClientValidation'=>true,
      'enableAjaxValidation' => true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
    )); 
  ?>


  <?php            
    echo $form->errorSummary($model_detail);
    //echo $form->errorSummary($model_hcontact);
    //echo $form->errorSummary($model_dcontact);
  ?>

  <?php
    $tab1 = 'customerdetail';
     
    $this->widget('CTabView',array(
        'tabs'=>array(
            $tab1 => array(                
                'title'=>'Customer Detail', 
                'view'=>'customerdetail',
                'data'=>array('model_detail'=>$model_detail
                                , 'list'=>$list
                                //, 'model_hcontact'=>$model_hcontact
                                //, 'model_dcontact'=>$model_dcontact
                                , 'form'=>$form)                  
            ),               
        ),
        'cssFile'=>false,
        'activeTab'=>$activeTab,
        'id'=>'tab_customerdetail',
    ));
  ?>
  <?php $this->endWidget(); ?>
  </div>
</div>
