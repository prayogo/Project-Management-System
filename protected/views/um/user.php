<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'User',
);
?>

<h1 class="blok" style="padding: 8px 15px;background-color: #f5f5f5;margin-bottom: 20px;">
  <i class="fi-torso-business"></i> Users
</h1>

<?php 
  echo CHtml::errorSummary($model);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <a class="btn btn-default" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('user/manageuser') ?>"><i class="fi-plus"></i> Add New User</a>
  </div>
  <div class="metro panel-body">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>
          <th class="text-left">Username</th>
          <th class="text-left">Name</th>
          <th class="text-left">Email</th>
          <th class="text-left">Phone</th>
          <th class="text-left">Enable</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if (count($data) > 0){
            for($i=0; $i < count($data); $i++){
              echo '<tr>';
              echo '<td style="width:20rem">'.$data[$i]['Username'].'</td>';
              echo '<td style="width:30rem">'.$data[$i]['Name'].'</td>';
              echo '<td style="width:15rem">'.$data[$i]['Email'].'</td>';
              echo '<td style="width:15rem">'.$data[$i]['Phone'].'</td>';
              echo '<td style="width:10rem"><input type="checkbox" disabled="true" checked="'.($data[$i]['Enable'] ? 'true' : 'false').'"></td>';
              echo '</tr>';
            }
          }
        ?>
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
