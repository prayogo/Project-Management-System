<?php
/* @var $this PmsController */

$this->breadcrumbs=array(
	'Pms'=>array('/pms'),
	'Agreements',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Project Agreement</h1>
<div class="blok">
  <div class="row collapse" style="margin-top:5px">
    <div class="columns" style="width:auto; float:left; margin-right: 10px">     
      <a class="button tiny" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('agreement/manageagreement') ?>"><i class="fi-plus"></i> Add New Agreement</a>	    	
    </div>
  </div>  
  <hr />
  <div class="metro">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>          
          <th class="text-left">Project</th>          
          <th class="text-left">Agreement Title</th>
          <th class="text-left">Agreement Type</th>
          <th class="text-left">Start Date</th>
          <th class="text-left">End Date</th>
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
