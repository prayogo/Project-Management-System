<?php
/* @var $this CustomerController */

$this->breadcrumbs=array(
	'pms'=>array('/pms'),
	'Customer',
);
?>

<h1 class="blok"><i class="fi-torso-business"></i> Manage Customer</h1>
<div class="blok">
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Customer Detail', 
                  'view'=>'customerdetail'
              ),               
          ),
          'cssFile'=>false,        
      ));
    ?>
    
  </div>
</div>
