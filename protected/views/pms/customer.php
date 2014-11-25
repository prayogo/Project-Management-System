<?php
/* @var $this PmsController */

$this->breadcrumbs=array(
  'Pms'=>array('/pms'),
  'Customer',
);
?>
<h1 class="blok" style="padding: 8px 15px;background-color: #f5f5f5;margin-bottom: 20px;">
  <i class="fi-torso-business"></i> Customers
</h1>
<div class="panel panel-default">
  <div class="panel-heading">
    <a class="btn btn-default" style="margin-bottom:0px" href="<?php echo Yii::app()->createUrl('customer/managecustomer') ?>"><i class="fi-plus"></i> Add New Customers</a>
  </div>
  <div class="metro panel-body">
    <table class="table hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr> 
          <th class="text-left">CustomerId</th>
          <th class="text-left">Company</th>          
          <th class="text-left">Company Type</th>
          <th class="text-left">Contact Name</th>
          <th class="text-left">Business Phone</th>
          <th class="text-left">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
    
  <script>  
    $.ajax({
      type: "POST",
      url: '<?php echo Yii::app()->request->baseUrl; ?>/pms/GetCustomerList',
      data: {"ajax":"1"},
      dataType: "json",
      success: AjaxGetFieldDataSucceeded,
      //error: AjaxGetFieldDataFailed
    });

    function AjaxGetFieldDataSucceeded(result) {
      if (result != "[]") {
        //instance of datatable
        oTable = $('#dataTables-1').dataTable({          
          "order": [ 2, "asc"],
          'bProcessing': true,
          "aaData": result,
          //important  -- headers of the json
          'aoColumns': [
            { 'mData': 'CustomerId' },
            { 'mData': 'Company' },
            { 'mData': 'Company Type' },
            { 'mData': 'Contact Name' },
            { 'mData': 'Business Phone' },
          ],          
          'aoColumnDefs': [
            { 
              'aTargets': [ 5 ],
              'mData': 'CustomerId',
              'mRender': function ( data, type, full ) {
                var editUrl ='<?php echo Yii::app()->createUrl('customer/managecustomer',array('id'=>'')) ?>' + '/' + data;
                var deleteUrl = '<?php echo Yii::app()->createUrl('pms/customer') ?>';
                return '<form method="POST" action="'+deleteUrl+'" name="update-delete-form"><a class="btn-link" style="padding-left:0px; padding-right:2px" href="'+editUrl+'"><span class="glyphicon glyphicon-pencil"></span></a> <a class="btn-link delete" style="padding-left:0px; padding-right:2px"><span class="glyphicon glyphicon-trash"></span></a><input type="hidden" value="'+data+'" name="CustomerForm[CustomerId]" /></form>';
              }
            },
            { 'visible': false,  'targets': [ 0 ] },
            { 'targets': [ 5 ], 'orderable': false }
          ],          
          'fnInitComplete':function(){
            $('.delete').click(function(e){
              bootbox.dialog({
                message: "Are you sure want to delete?",
                title: "<span class='glyphicon glyphicon-question-sign'></span> Delete User",
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
