<div class="panel panel-default">

<?php 
/*
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'group-header-form-groupaccess-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); */
?>

	<div class="panel-body">
	    <div class="form-horizontal" role="form"> 
        	<table id="tblGroupAccess" class="table striped hovered dataTable" width="100%">
              <thead>
                <tr>
                  <th style="width:5%"></th>
                  <th>MenuId</th>
                  <th>Menu</th>
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
    <?php //$this->endWidget(); ?>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
<script>
	var checkedAccess = new Array();
	<?php
		if (isset($checkAccess)){
			for($i = 0; $i < count($checkAccess); $i++){ ?>
        		checkedAccess.push('<?php echo $checkAccess[$i]	; ?>');
	<?php 	}
		}
	?>
	
	$.ajax({
		type: "POST",
		url: '<?php echo Yii::app()->request->baseUrl;?>/group/GroupAccessList',
		data: {"ajax":"1"},
		dataType: "json",
		success: AjaxGetFieldDataSucceeded,
		//error: AjaxGetFieldDataFailed
	});
	
	function AjaxGetFieldDataSucceeded(result) {
		$('#tblGroupAccess').dataTable({
			"order": [[ 2, "asc"]],
			"bProcessing": true,
			"aaData": result,
			"aoColumns": [
				{ 'mData': 'canAccess', 'sClass':'text-center' },
				{ 'mData': 'MenuId' },
				{ 'mData': 'Caption' },
			],
			'aoColumnDefs': [
				{ 
					'aTargets': [ 0 ],
					'mData': 'canAccess',
					'mRender': function ( data, type, row ) {
						var checked = data == 0 ? "" : "checked";
						if (jQuery.inArray(row.MenuId, checkedAccess) >= 0){
							checked = "checked";
						}
						return '<input name="GroupAccessForm[GroupAccess]['+row.MenuId+']" type="checkbox" '+checked+'/>';
					}
				},
				{ 'visible': false,  'targets': [ 1 ] },
				{ 'targets': [ 0 ], 'orderable': false }
			],
		});
	}
</script> 