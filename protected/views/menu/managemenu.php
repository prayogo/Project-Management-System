	<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Menu',
);
?>

<h1 class="blok"><i class="fi-torso-business"></i> Manage Menu</h1>
<div>
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
      $tab2 = 'panel2-2';
      $tab3 = 'panel2-3';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Menu Detail', 
                  'view'=>'menudetail',
				  'data'=>array('model'=>$model, 'data'=>$data),
              ), 
              $tab2 => array(                
                  'title'=>'Menu User',
                  'view'=>'menuuser'
              ),
              $tab3 => array(                
                  'title'=>'Menu Group',
                  'view'=>'menugroup'
              ),
          ),
          'cssFile'=>false,        
      ));
    ?>
  </div>
</div>
