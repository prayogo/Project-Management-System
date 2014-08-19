<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Group',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Manage Group</h1>
<div class="blok">
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
      $tab2 = 'panel2-2';
      $tab3 = 'panel2-3';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Group Detail', 
                  'view'=>'groupdetail'
              ), 
              $tab2 => array(                
                  'title'=>'Group Access',
                  'view'=>'groupaccess'
              ),
              $tab3 => array(                
                  'title'=>'Group User',
                  'view'=>'groupuser'
              ),
          ),
          'cssFile'=>false,        
      ));
    ?>
    
  </div>
</div>
