<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Project'=>array('/pms'),
	'Project',
);
?>

<h1 class="blok"><i class="fi-torso-business"></i> Manage Project</h1>
<div class="blok">
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Project Detail', 
                  'view'=>'projectdetail'
              ),               
          ),
          'cssFile'=>false,        
      ));
    ?>
    
  </div>
</div>
