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
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Menu Detail', 
                  'view'=>'menudetail',
				  'data'=>array('model'=>$model),
              ), 
          ),
          'cssFile'=>false,        
      ));
    ?>
  </div>
</div>
