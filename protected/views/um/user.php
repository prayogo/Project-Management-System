<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'User',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Users</h1>
<div class="blok">
      <a class="btn btn-default" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('user/manageuser') ?>"><i class="fi-plus"></i> Add New User</a>
  <hr />
  <div class="metro">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>
          <th class="text-left">User</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>User</td>
        </tr>
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
