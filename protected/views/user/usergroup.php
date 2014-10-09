<div class="panel panel-default" id="user-group">
	<?php echo $form->hiddenField($model_user,'isChange') ?>
	<div class="panel-body">
	    <div class="form-horizontal" role="form"> 
            <table id="tblUserGroup" width="100%">
              <thead>
                <tr>
                  <th ></th>
                  <th>HGroupId</th>
                  <th >Group Name</th>
                  <th >Description</th>                  
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
	
	$('#user-group').change(function(e){
		$('#UserGroupForm_isChange').val('1');
	});

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
		success: AjaxGetFieldDataSucceededGroup,
		//error: AjaxGetFieldDataFailed
	});
	
	function AjaxGetFieldDataSucceededGroup(result) {
		$('#tblUserGroup').dataTable().fnDestroy();
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
						if (jQuery.inArray(row.HGroupId, checkedGroup) >= 0){
							checked = "checked";
						}
						return '<input name="UserGroupForm[UserGroup]['+row.HGroupId+']" type="checkbox" '+checked+'/>';
					}
				},
				{ 'visible': false,  'targets': [ 1 ] },
				{ 'targets': [ 0 ], 'orderable': false },
				{ "width": "5%", "targets": 0 }
			],
		});
	}
</script> 