<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Group',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Manage Group</h1>
<div>
  <div class="metro">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'group-header-form-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); 
?>

	<?php 
		$form->error($model_detail,'Group');
        $form->error($model_detail,'Description'); 
		$form->error($model_detail,'Enable');
		echo $form->errorSummary($model_detail); ?>
        
    <?php
      $tab1 = 'groupdetail';
      $tab2 = 'groupaccess';
      $tab3 = 'groupuser';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(             
                  'title'=>'Group Detail', 
                  'view'=>'groupdetail',
				  'data'=>array('model_detail'=>$model_detail, 'form'=>$form),
              ), 
              $tab2 => array(                
                  'title'=>'Group Access',
                  'view'=>'groupaccess',
				  'data'=>array('model_access'=>$model_access, 'checkAccess'=>$checkAccess, 'form'=>$form),
              ),
              $tab3 => array(                
                  'title'=>'Group User',
                  'view'=>'groupuser',
				  'data'=>array('model_user'=>$model_user, 'checkUser'=>$checkUser, 'form'=>$form),
              ),
          ),
          'cssFile'=>false,        
		  'activeTab'=>$activeTab,
		  'id'=>'tab_groupdetail',
      ));
    ?>
<?php $this->endWidget(); ?>    
  </div>
</div>
