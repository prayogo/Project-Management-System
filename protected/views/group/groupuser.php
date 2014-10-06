<div class="panel panel-default" id="group-user">
<?php echo $form->hiddenField($model_user,'isChange') ?>
	<div class="panel-body">
	    <div class="form-horizontal" role="form"> 
            <table id="tblGroupUser" width="100%">
              <thead>
                <tr>
                  <th style="width:5%"></th>
                  <th>UserId</th>
                  <th style="width:40%">Name</th>
                  <th style="width:30%">Username</th>
                  <th style="width:25%">Email</th>
                </tr>
              </thead>
              <tbody>
		      </tbody>
            </table>
		</div>
	</div>
    <div class="panel-footer">
        <div>
            <a class="btn btn-default" href="<?php echo Yii::app()->createUrl('um/group') ?>">
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
	$('#group-user').change(function(e){
		$('#GroupUserForm_isChange').val('1');
	});
	
	var checkedUser = new Array();
	<?php
		if (isset($checkUser)){
			for($i = 0; $i < count($checkUser); $i++){ ?>
        		checkedUser.push('<?php echo $checkUser[$i]	; ?>');
	<?php 	}
		}
	?>
	
	$.ajax({
		type: "POST",
		url: '<?php echo Yii::app()->request->baseUrl;?>/group/GroupUserList',
		data: {"ajax":"1"},
		dataType: "json",
		success: AjaxGetFieldDataSucceededUser,
		//error: AjaxGetFieldDataFailed
	});
	
	function AjaxGetFieldDataSucceededUser(result) {
		$('#tblGroupUser').dataTable().fnDestroy();
		$('#tblGroupUser').dataTable({
			"order": [[ 2, "asc"]],
			"bProcessing": true,
			"aaData": result,
			"aoColumns": [
				{ 'mData': 'canAccess', 'sClass':'text-center' },
				{ 'mData': 'UserId' },
				{ 'mData': 'Name' },
				{ 'mData': 'Username' },
				{ 'mData': 'Email' },
			],
			'aoColumnDefs': [
				{ 
					'aTargets': [ 0 ],
					'mData': 'canAccess',
					'mRender': function ( data, type, row ) {
						var checked = data == 0 ? "" : "checked";
						if (jQuery.inArray(row.UserId, checkedUser) >= 0){
							checked = "checked";
						}
						return '<input name="GroupUserForm[GroupUser]['+row.UserId+']" type="checkbox" '+checked+'/>';
					}
				},
				{ 'visible': false,  'targets': [ 1 ] },
				{ 'targets': [ 0 ], 'orderable': false },
			],
		});
	}
</script> 
<style>
	#tblGroupUser tr td:first-child{
		width:5%;	
	}
</style>