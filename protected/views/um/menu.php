<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Menu',
);
?>
<?php 
	echo CHtml::errorSummary($model);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Menu</h1>
<div class="blok">
  <div class="row collapse" style="margin-top:5px">
    <div class="columns" style="width:auto; float:left; margin-right: 10px">     
      <a class="button tiny" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('menu/managemenu') ?>"><i class="fi-plus"></i> Add New Menu</a>	    	
    </div>
  </div>  
  <hr />
  <div class="metro">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>
          <th class="text-left">Menu</th>
          <th class="text-left">Link</th>
          <th class="text-left">Icon</th>
          <th class="text-left">Enable</th>
        </tr>
      </thead>
      <tbody>
      	<?php
			if (count($data) > 0){
				for($i=0; $i < count($data); $i++){
					echo '<tr>';
					echo '<td style="width:45rem">'.$data[$i]['Caption'].'</td>';
					echo '<td style="width:35rem">'.$data[$i]['Link'].'</td>';
					echo '<td style="width:25rem">'.$data[$i]['IconCSS'].'</td>';
					echo '<td style="width:15rem"><input type="checkbox" disabled="true" checked="'.($data[$i]['Enable'] ? 'true' : 'false').'"></td>';
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
