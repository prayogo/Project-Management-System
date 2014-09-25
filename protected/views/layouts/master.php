<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation-icons/foundation-icons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/attrchange.js"></script> 


<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/fastclick.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.widget.min.js"></script>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="page-sidebar">
<div id="page">
  	<nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#panel-navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><b>Creates</b></a>
        </div>
        <div class="collapse navbar-collapse navbar-form navbar-left">
            <button type="submit" class="btn btn-default" id="menuTrigger" data-switch="hide">
            	<span class="glyphicon glyphicon-th"></span></button>
		</div>
        <div class="collapse navbar-collapse" id="panel-navbar">
          <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="fi-home"></span> Home</a></li>
			<li><a href="#"><span class="fi-clipboard-pencil"></span> Your Projects</a></li>
	        <li><a href="#"><span class="fi-info"></span> Notification</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fi-torso-female"></span> Administrator <span class="caret"></span></a>
              <ul class="dropdown-menu"role="menu" >
              	<li><a href="#"><span class="fi-widget"></span> Setting</a></li>
              	<li><a><span class="fi-power"></span> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


  <div id="mainmenu">
    <div style="margin-left:0px; margin-right:0px">
      <div style="background:#FAFAFA; border:1px solid #f3f3f3;float:left" id="containerLeft">
        <div class="sidebar" >
          <nav>
            <div class="list-group" style="width:250px">
            
				<a class="no-select list-group-item side-heading side-trigger" data-switch="show" data-target="UM">
                	<span class="badge"><span name="bgicon" class="glyphicon glyphicon-minus"></span></span>
                    	<i class="fi-torsos"></i> User Management</a>              
                        
				<a class="UM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('um/user') ?>">
                	<i class="fi-torso"></i> Users</a>
				<a class="UM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('um/menu') ?>">
                	<i class="fi-list"></i> Menus</a>
              	<a class="UM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('um/group') ?>">
                	<i class="fi-torsos-all"></i> Groups</a>
               	
                <a href="#" class="no-select list-group-item side-heading side-trigger" data-switch="show" data-target="PM">
                <span class="badge"><span name="bgicon" class="fi-minus"></span></span>
				<i class="fi-clipboard-pencil"></i> Project Management</a>
                
                <a class="PM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('pms/customer') ?>">
                	<i class="fi-torso-business"></i> Customers</a>
                <a class="PM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('pms/project') ?>">
                    <i class="fi-clipboard-pencil"></i> Projects</a>
				<a class="PM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('pms/agreement') ?>">
        	        <i class="fi-page-multiple"></i> Agreements</a>
                <a class="PM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('pms/consultant') ?>">
    	            <i class="fi-results-demographics"></i> Consultants</a>
                <a class="PM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('pms/deliverables') ?>">
	                <i class="fi-clipboard-notes"></i> External Deliverable</a>
                <a class="PM sideItem list-group-item" href="<?php echo Yii::app()->createUrl('pms/deliverables') ?>">
                	<i class="fi-dollar"></i> External Payments</a>
              <a class="PM sideItem list-group-item "><i class="fi-clipboard-notes"></i> Internal Deliverable</a></li>
              <a class="PM sideItem list-group-item"><i class="fi-list-bullet"></i> Tasks</a></li>
              <a class="PM sideItem list-group-item"><i class="fi-monitor"></i> Monitoring</a></li>              
              <a href="#" class="no-select list-group-item side-heading side-trigger" data-switch="show" data-target="RG">                
        <i class="fi-graph-trend"></i> Report Generator</a>
        </div>
            </div>
          </nav>
        </div> 
      </div>      
      <div class="large-9 medium-8 columns" style="float:right; margin-top:10px;" id="containerRight"> 
        <!-- mainmenu -->
        <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
      			'links'=>$this->breadcrumbs,
      			'tagName'=>'ol',             
      			'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
      			'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
      			'homeLink'=>'<li><a href="'.Yii::app()->homeUrl.'">Home</a></li>',
      			'separator'=>''
      			)); ?>
        <!-- breadcrumbs -->
        <?php endif?>
        <?php echo $content; ?> </div>
    </div>
  </div>
  <div class="clear"></div>
  <!--
  <nav class="navbar navbar-default navbar-fixed-bottom collapse navbar-collapse" role="navigation" style="background:rgb(182, 182, 182)">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav">
        <div>
 			<span style="color:white; font-size:20px;">Creates</span><br>
            <span style="color:white; font-size:12px;">© 2014, Inc. All rights reserved.</span>
		</div>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <div style="float:right; padding-right:24px;">
         	<a style="margin-left:10px"><i class="fi-social-facebook" style="color:white; font-size:40px;"></i></a>
            <a style="margin-left:10px"><i class="fi-social-linkedin" style="color:white; font-size:40px;"></i></a>
		</div>
      </ul>
    </div>
  </div>
</nav>-->
  
</div>
<!-- page -->
</body>
</html>

<script>

	// $(document).foundation();

	$('.side-trigger').click(function(e){
		var target = '.'+$(this).attr('data-target');
		if ($(this).attr('data-switch') == 'hide'){
			$(target).slideDown();
			$(this).find('span[name="bgicon"]').attr('class', 'glyphicon glyphicon-minus');
			$(this).attr('data-switch', 'show');
		}else{
			$(target).slideUp();
			$(this).find('span[name="bgicon"]').attr('class', 'glyphicon glyphicon-plus');
			$(this).attr('data-switch', 'hide');
		}
	});
	
	function switchClick(){
		$('#menuTrigger').unbind('click');
		if ($('#menuTrigger').attr('data-switch') == 'hide'){
			$('#containerRight').css('width', '75%');
			$('.sidebar').slideDown();
			//$('#menuTrigger').css('background','#2FB1A2');
			$('#menuTrigger').attr('data-switch', 'show');
		}else{
			$('.sidebar').slideUp(function(){
				$('#containerRight').css('width', '100%');
			});
			//$('#menuTrigger').css('background','');
			$('#menuTrigger').attr('data-switch', 'hide');
		}
		setTimeout(function() {
			$('#menuTrigger').click(function(e){
				switchClick();
			});
		}, 500);
	}
	
	$('#menuTrigger').click(function(e){
		switchClick();
	});
	$('#menuTrigger').click();
	
	$('.reveal-modal').attrchange({
		trackValues: true,
		callback: function (event) { 
			if($('.reveal-modal.open').length > 0){
				$('body').css('overflow','hidden');
			}else{
				$('body').css('overflow','');
			}
		}        
	});
	

</script>
