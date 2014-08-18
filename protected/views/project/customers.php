<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Project'=>array('/project'),
	'Customers',
);
?>

<h1 class="blok"><i class="fi-torso-business"></i> Customers</h1>
<div class="blok">
  <div class="row collapse" style="margin-top:5px">
    <div class="columns" style="width:auto; float:left; margin-right: 10px"> 
    	<a class="button tiny" style="margin-bottom:0px" data-reveal-id="firstModal"><i class="fi-plus"></i> Add New Customer</a> </div>
  </div>
  <div id="firstModal" class="reveal-modal" data-reveal>
      <h2>This is a modal.</h2>
      <p>Reveal makes these very easy to summon and dismiss. The close button is simply an anchor with a unicode character icon and a class of <code>close-reveal-modal</code>. Clicking anywhere outside the modal will also dismiss it.</p>
      <p>Finally, if your modal summons another Reveal modal, the plugin will handle that for you gracefully.</p>
      <p><a href="#" data-reveal-id="secondModal" class="secondary button">Second Modal...</a></p>
      <a class="close-reveal-modal">&#215;</a>
  </div>
  <hr />
  <div class="metro">
    <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
      <thead>
        <tr>
          <th class="text-left">Engine</th>
          <th class="text-left">Browser</th>
          <th class="text-left">Platform</th>
          <th class="text-left">Version</th>
          <th class="text-left">CSS grade</th>
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
					{ "mData": "engine" },
					{ "mData": "browser" },
					{ "mData": "platform" },
					{ "mData": "version" },
					{ "mData": "grade" }
				]
			} );
		});
	</script> 
  </div>
</div>
