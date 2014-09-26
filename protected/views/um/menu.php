<?php
/* @var $this UmController */
$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Menu',
);
?>
<h1 class="blok" style="padding: 8px 15px;background-color: #f5f5f5;margin-bottom: 20px;">
	<i class="fi-torso-business"></i> Menu
</h1>
<?php 
	echo CHtml::errorSummary($model);
?>
<div class="panel panel-default">
  <div class="panel-heading">
      <a class="btn btn-default" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('menu/managemenu') ?>">
      	<i class="glyphicon glyphicon-plus"></i> Add New Menu</a>	    	
  </div>  
  <div class="metro panel-body">
    <table class="table hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>
          <th class="text-left">Menu</th>
          <th class="text-left">Link</th>
          <th class="text-left">Icon</th>
          <th class="text-left">Enable</th>
          <th class="text-left">Action</th>
        </tr>
      </thead>
      <tbody>

      	<?php
			if (isset($data) && count($data) > 0){
				for($i=0; $i < count($data); $i++){
					echo '<tr>';
					echo '<td style="width:45rem">'.$data[$i]['Caption'].'</td>';
					echo '<td style="width:35rem">'.$data[$i]['Link'].'</td>';
					echo '<td style="width:25rem">'.$data[$i]['IconCSS'].'</td>';
					echo '<td style="width:15rem"><input type="checkbox" disabled="true" checked="'.($data[$i]['Enable'] ? 'true' : 'false').'"></td>'; 
					echo '<td style="width:15rem">';
					$form=$this->beginWidget('CActiveForm', array(
						'id'=>'update-delete-form'.$i,
						'htmlOptions'=>array(
							'name'=>'update-delete-form',
						),
					));
echo '<button type="submit" class="btn-link" style="padding-left:0px; padding-right:2px"><span class="glyphicon glyphicon-pencil"></span></button> 
	<button type="submit" class="btn-link delete" style="padding-left:0px; padding-right:2px"><span class="glyphicon glyphicon-trash"></span></button>';
						$model->MenuId = $data[$i]['MenuId'];
					echo $form->hiddenField($model,'MenuId');
					$this->endWidget();				
					echo '</td>';
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
