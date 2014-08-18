<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Menu',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Menu</h1>
<div class="blok">
  <div class="row collapse" style="margin-top:5px">
    <div class="columns" style="width:auto; float:left; margin-right: 10px">     	
    	<?php echo CHtml::link('<i class="fi-plus"></i> Add New Menu','../menu/managemenu',array('class'=>'button tiny','style'=> 'margin-bottom:0px')); ?>
    </div>
  </div>  
  <hr />
  <div class="metro">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>
          <th class="text-left">Menu</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
    
    <script>
		$(function(){
			$('#dataTables-1').dataTable( {
				"bProcessing": true,
				"sAjaxSource": "http://localhost:8088/Metro-UI-CSS-master/docs/data/dataTables-objects.txt",
				"aoColumns": [
					{ "mData": "engine" }
				]
			} );
		});
	</script> 
  </div>
</div>
