
<table id="tblUserAccess" width="100%">
  <thead>
    <tr>
      <td width="5%"></td>
      <td width="35%">Menu</td>
      <td width="60%">Level</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td width="5%"><input type="checkbox" /></td>
      <td width="35%">Menu 1</td>
      <td width="60%">User</td>
    </tr>
    <tr>
      <td width="5%"><input type="checkbox" /></td>
      <td width="35%">Menu 2</td>
      <td width="60%">Group</td>
    </tr>
    <tr>
      <td width="5%"><input type="checkbox" /></td>
      <td width="35%">Menu 3</td>
      <td width="60%">User</td>
    </tr>
</table>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
<script>
    $(function(){
      $('#tblUserAccess').dataTable();
    });
  </script> 