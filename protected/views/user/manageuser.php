<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'User',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Manage User</h1>
<div>
  <div class="metro">
  <?php 
    $form=$this->beginWidget('CActiveForm', array(
      'id'=>'user-detail-form-userdetail-form',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
    )); 
  ?>

  <?php     
    $form->error($model_detail,'Username');
    $form->error($model_detail,'Name'); 
    $form->error($model_detail,'Email');
    $form->error($model_detail,'Phone');
    $form->error($model_detail,'Password');
       
    echo $form->errorSummary($model_detail);    
  ?>

    <?php
      $tab1 = 'userdetail';
      $tab2 = 'useraccess';
      $tab3 = 'usergroup';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'User Detail', 
                  'view'=>'userdetail',
                  'data'=>array('model_detail'=>$model_detail, 'form'=>$form),
              ), 
              $tab2 => array(                
                  'title'=>'User Access',
                  'view'=>'useraccess',
                  'data'=>array('model_access'=>$model_access, 'checkAccess'=>$checkAccess, 'form'=>$form),
              ),
              $tab3 => array(                
                  'title'=>'User Group',
                  'view'=>'usergroup',
                  'data'=>array('model_user'=>$model_user,'checkGroup'=>$checkGroup,'form'=>$form),
              ),
          ),
          'cssFile'=>false,
          'activeTab'=>$activeTab
      ));
    ?>   
  <?php $this->endWidget(); ?>    
  </div>
</div>
