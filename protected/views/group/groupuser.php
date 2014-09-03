
<table id="tblGroupUser" width="100%">
  <thead>
    <tr>
      <td width="5%"></td>      
      <td width="95%">User Name</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="5%"><input type="checkbox" /></td>      
      <td width="95%">User</td>      
    </tr>
    <tr>
      <td width="5%"><input type="checkbox" /></td>
      <td width="95%">User</td>      
    </tr>
    <tr>
      <td width="5%"><input type="checkbox" /></td>
      <td width="95%">User</td>      
    </tr>
</table>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
<script>
    $(function(){
      $('#tblGroupUser').dataTable();
    });
  </script> 