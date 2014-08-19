<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'User',
);
?>


<h1 class="blok"><i class="fi-torso-business"></i> Manage User</h1>
<div class="blok">
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
      $tab2 = 'panel2-2';
      $tab3 = 'panel2-3';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'User Detail', 
                  'view'=>'userdetail'
              ), 
              $tab2 => array(                
                  'title'=>'User Access',
                  'view'=>'useraccess'
              ),
              $tab3 => array(                
                  'title'=>'User Group',
                  'view'=>'usergroup'
              ),
          ),
          'cssFile'=>false,        
      ));
    ?>   
  </div>
</div>
