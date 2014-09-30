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
          <th class="text-left">MenuId</th>	
          <th class="text-left">Menu</th>
          <th class="text-left">Link</th>
          <th class="text-left">Parent</th>
          <th class="text-left">ParentId</th>
          <th class="text-left">Enable</th>
          <th class="text-left">Action</th>
        </tr>
      </thead>
    </table>
    <?php 
		echo CHtml::beginForm(); 
							
		echo CHtml::endForm();
	?>

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
    
    <script>
		
		$(function(){
			var siteUrl ='<?php echo Yii::app()->request->baseUrl;?>/um/GetMenuList/ajax/1';
			$('#dataTables-1').dataTable({
				"order": [[ 4, "asc" ], [ 1, "asc"]],
				'bProcessing': true,
				'sAjaxSource': siteUrl,
                'aoColumns': [
					{ 'mData': 'MenuId' },
                    { 'mData': 'Caption' },
                    { 'mData': 'Link' },
                    { 'mData': 'Parent' },
					{ 'mData': 'ParentId' },
                    { 'mData': 'Enable' },
				],
				'aoColumnDefs': [
				 	{ 
						'aTargets': [ 5 ],
      					'mData': 'Enable',
						'mRender': function ( data, type, full ) {
							var checked = data == 0 ? "" : "checked";
							return '<input type="checkbox" '+checked+' disabled="true"/>';
						}
            		},
					{ 
						'aTargets': [ 6 ],
      					'mData': 'MenuId',
						'mRender': function ( data, type, full ) {
							var editUrl ='<?php echo Yii::app()->createUrl('menu/managemenu',array('id'=>'')) ?>' + '/' + data;
							var deleteUrl = '<?php echo Yii::app()->createUrl('um/menu') ?>';
							return '<form method="POST" action="'+deleteUrl+'" name="update-delete-form"><a class="btn-link" style="padding-left:0px; padding-right:2px" href="'+editUrl+'"><span class="glyphicon glyphicon-pencil"></span></a> <a class="btn-link delete" style="padding-left:0px; padding-right:2px"><span class="glyphicon glyphicon-trash"></span></a><input type="hidden" value="'+data+'" name="MenuDetailForm[MenuId]" /></form>';
						}
            		},
					{ 
						'aTargets': [ 2 ],
      					'mData': 'Link',
						'mRender': function ( data, type, full ) {
							return '<a href="'+data+'">'+data+'</a>';
						}
            		},
            		{ 'visible': false,  'targets': [ 0, 4 ] }
        		],
				'fnInitComplete':function(){
					$('.delete').click(function(e){
						bootbox.dialog({
						  message: "Are you sure want to delete?",
						  title: "<span class='glyphicon glyphicon-question-sign'></span> Delete Menu",
						  buttons: {
							 cancel: {
								label: "Cancel",
								className: "btn-default",
							},
							main: {
							  label: "OK",
							  className: "btn-primary",
							  callback: function() {
								$($(e)[0].currentTarget).closest('form').submit();
							  }
							}
						  }
						});
						event.preventDefault();
					});
				}
			});
		});
	</script> 
  </div>
</div>
