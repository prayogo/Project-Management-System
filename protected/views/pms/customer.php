<?php
/* @var $this PmsController */

$this->breadcrumbs=array(
	'Pms'=>array('/pms'),
	'Customer',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Customer</h1>
<div class="blok">
  <div class="row collapse" style="margin-top:5px">
    <div class="columns" style="width:auto; float:left; margin-right: 10px">     
      <a class="button tiny" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('customer/managecustomer') ?>"><i class="fi-plus"></i> Add New Customer</a>	    	
    </div>
  </div>  
  <hr />
  <div class="metro">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>          
          <th class="text-left">Company</th>          
          <th class="text-left">Company Type</th>
          <th class="text-left">Contact Name</th>
          <th class="text-left">Business Phone</th>
          <th class="text-left">Email</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
    
    <script>
		$(function(){
			$('#dataTables-1').dataTable();
		});
	</script> 
  </div>
</div>
