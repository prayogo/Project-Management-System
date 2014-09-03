<?php
/* @var $this AgreementController */

$this->breadcrumbs=array(
	'Agreement'=>array('/agreement'),
	'Manageagreement',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Manage Agreement</h1>
<div class="blok">
  <div class="metro">
    <?php
      $tab1 = 'panel2-1';
       
      $this->widget('CTabView',array(
          'tabs'=>array(
              $tab1 => array(                
                  'title'=>'Agreement Detail', 
                  'view'=>'agreementdetail'
              ),               
          ),
          'cssFile'=>false,        
      ));
    ?>
    
  </div>
</div>
