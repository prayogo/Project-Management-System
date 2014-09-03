<?php
/* @var $this ConsultantController */

$this->breadcrumbs=array(
	'Consultant'=>array('/pms'),
	'Consultant',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Manage Consultant</h1>
<div class="blok">
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Consultant Detail', 
                  'view'=>'consultantdetail'
              ),               
          ),
          'cssFile'=>false,        
      ));
    ?>
    
  </div>
</div>
