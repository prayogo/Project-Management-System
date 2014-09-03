<?php
/* @var $this DeliverableController */

$this->breadcrumbs=array(
	'Deliverable'=>array('/pms'),
	'Deliverables',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Manage Deliverables</h1>
<div class="blok">
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Deliverables Detail', 
                  'view'=>'deliverabledetail'
              ),               
          ),
          'cssFile'=>false,        
      ));
    ?>
    
  </div>
</div>
