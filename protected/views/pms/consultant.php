<?php
/* @var $this PmsController */

$this->breadcrumbs=array(
	'Pms'=>array('/pms'),
	'Consultant',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Consultant</h1>
<div class="blok">
  <div class="row collapse" style="margin-top:5px">
    <div class="columns" style="width:auto; float:left; margin-right: 10px">     
      <a class="button tiny" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('consultant/manageconsultant') ?>"><i class="fi-plus"></i> Add New Consultant</a>	    	
    </div>
  </div>  
  <hr />
  <div class="metro">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>          
          <th class="text-left">Lecture ID</th>          
          <th class="text-left">Employee ID</th>
          <th class="text-left">Name</th>
          <th class="text-left">Department of Teaching</th>
          <th class="text-left">Email</th>
          <th class="text-left">Phone</th>
          <th class="text-left">Bank Name</th>
          <th class="text-left">Bank Account</th>
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
