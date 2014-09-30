<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Group',
);
?>
<h1 class="blok" style="padding: 8px 15px;background-color: #f5f5f5;margin-bottom: 20px;">
	<i class="fi-torso-business"></i> Groups
</h1>
<div class="panel panel-default">
  <div class="panel-heading">    
      <a class="btn btn-default" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('group/managegroup') ?>">
      	<i class="glyphicon glyphicon-plus"></i> Add New Group</a>    	
  </div>  
  <div class="metro panel-body">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>
          <th class="text-left">Group</th>
          <th class="text-left" style="width:12%">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
    
    <script>
		$.ajax({
			type: "POST",
			url: '<?php echo Yii::app()->request->baseUrl;?>/um/GetGroupList',
			data: {"ajax":"1"},
			dataType: "json",
			success: AjaxGetFieldDataSucceeded,
			//error: AjaxGetFieldDataFailed
		});
		
		function AjaxGetFieldDataSucceeded(result) {
			if (result != "[]") {
				//instance of datatable
				oTable = $('#dataTables-1').dataTable({
					"order": [[ 1, "asc"]],
					"bProcessing": true,
					"aaData": result,
					//important  -- headers of the json
					"aoColumns": [
						{ 'mData': 'HGroupId' },
						{ 'mData': 'Group' },
						{ 'mData': 'Enable' },
					],
					'aoColumnDefs': [
						{ 
							'aTargets': [ 3 ],
							'mData': 'MenuId',
							'mRender': function ( data, type, full ) {
								var editUrl ='<?php echo Yii::app()->createUrl('menu/managemenu',array('id'=>'')) ?>' + '/' + data;
								var deleteUrl = '<?php echo Yii::app()->createUrl('um/menu') ?>';
								return '<form method="POST" action="'+deleteUrl+'" name="update-delete-form"><a class="btn-link" style="padding-left:0px; padding-right:2px" href="'+editUrl+'"><span class="glyphicon glyphicon-pencil"></span></a> <a class="btn-link delete" style="padding-left:0px; padding-right:2px"><span class="glyphicon glyphicon-trash"></span></a><input type="hidden" value="'+data+'" name="MenuDetailForm[MenuId]" /></form>';
							}
						},
						{ 'visible': false,  'targets': [ 0 ] },
						{ 'targets': [ 2, 3 ], 'orderable': false }
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
			}	
		}
	</script> 
  </div>
</div>
