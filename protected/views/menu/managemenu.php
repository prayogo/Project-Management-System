<?php
/* @var $this UmController */

$this->breadcrumbs=array(
	'Um'=>array('/um'),
	'Menu',
);
?>
<h1 class="blok"><i class="fi-torso-business"></i> Manage Menu</h1>
<div class="blok">
  <div class="metro">
    <ul class="tabs" data-tab>
      <li class="tab-title active"><a href="#panel2-1">Menu Detail</a></li>
      <li class="tab-title"><a href="#panel2-2">Menu User</a></li>
      <li class="tab-title"><a href="#panel2-3">Menu Group</a></li>
    </ul>
    <div class="tabs-content">
      <div class="content active" id="panel2-1">
        <form>
          <div class="row">
            <div class="small-8">
              <div class="row">
                <div class="small-3 columns">
                  <label for="right-label" class="right inline">Menu Name</label>
                </div>
                <div class="small-9 columns">
                  <input type="text" id="right-label" placeholder="Menu Name...">
                </div>
              </div>              
              <div class="row">
                <div class="small-3 columns">
                  <label for="right-label" class="right inline">Navigation</label>
                </div>
                <div class="small-9 columns">
                  <input type="email" id="right-label" placeholder="Navigation...">
                </div>
              </div>
              <div class="row">
                <div class="small-3 columns">
                  <label for="right-label" class="right inline">Link</label>
                </div>
                <div class="small-9 columns">
                  <input type="email" id="right-label" placeholder="Link...">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="content" id="panel2-2">
        <table class="table striped hovered dataTable" id="dataTables-1" style="width:100%;">
          <thead>
            <tr>
              <th class="text-left">User</th>                       
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="content" id="panel2-3">
        <table class="table striped hovered dataTable" id="dataTables-2" style="width:100%;">
          <thead>
            <tr>
              <th class="text-left">Group</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
</div>
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.dataTables.js"></script> 
    
    <script>
		$(function(){
			$('#dataTables-1').dataTable( {
				"bProcessing": true,
				"sAjaxSource": "http://localhost:8088/Metro-UI-CSS-master/docs/data/dataTables-objects.txt",
				"aoColumns": [
					{ "mData": "engine" }
				]
			} );
      $('#dataTables-2').dataTable( {
        "bProcessing": true,
        "sAjaxSource": "http://localhost:8088/Metro-UI-CSS-master/docs/data/dataTables-objects.txt",
        "aoColumns": [
          { "mData": "platform" }
        ]
      } );
		});
	</script> 
  </div>
</div>
