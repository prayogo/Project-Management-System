<div class="panel panel-default">
	<div class="panel-body">
	    <div class="form-horizontal" role="form"> 
            <table id="tblUserGroup" width="100%">
              <thead>
                <tr>
                  <th style="width:5%"></th>
                  <th>HGroupId</th>
                  <th style="width:20%">Group Name</th>
                  <th style="width:50%">Description</th>                  
                </tr>
              </thead>
              <tbody>
		      </tbody>
            </table>
		</div>
	</div>
    <div class="panel-footer">
        <div>
            <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('um/user') ?>">
                <i class="glyphicon glyphicon-remove" style="display:block;font-size:26px;"></i>Cancel
            </a>
            <button type="submit" class="btn btn-default pull-right">
                <i class="glyphicon glyphicon-floppy-disk" style="display:block;font-size:26px;"></i>Save
            </button>
        </div>
    </div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
<script>
	var checkedGroup = new Array();
	<?php
		if (isset($checkGroup)){
			for($i = 0; $i < count($checkGroup); $i++){ ?>
        		checkedGroup.push('<?php echo $checkGroup[$i]	; ?>');
	<?php 	}
		}
	?>
	
	$.ajax({
		type: "POST",
		url: '<?php echo Yii::app()->request->baseUrl;?>/user/UserGroupList',
		data: {"ajax":"1"},
		dataType: "json",
		success: AjaxGetFieldDataSucceeded,
		//error: AjaxGetFieldDataFailed
	});
	
	function AjaxGetFieldDataSucceeded(result) {
		$('#tblUserGroup').dataTable({
			"order": [[ 2, "asc"]],
			"bProcessing": true,
			"aaData": result,
			"aoColumns": [
				{ 'mData': 'canAccess', 'sClass':'text-center' },
				{ 'mData': 'HGroupId' },
				{ 'mData': 'Group' },
				{ 'mData': 'Description' },
			],
			'aoColumnDefs': [
				{ 
					'aTargets': [ 0 ],
					'mData': 'canAccess',
					'mRender': function ( data, type, row ) {
						var checked = data == 0 ? "" : "checked";
						if (jQuery.inArray(row.GroupId, checkedUser) >= 0){
							checked = "checked";
						}
						return '<input name="UserGroupForm[UserGroup]['+row.GroupId+']" type="checkbox" '+checked+'/>';
					}
				},
				{ 'visible': false,  'targets': [ 1 ] },
				{ 'targets': [ 0 ], 'orderable': false }
			],
		});
	}
</script> 