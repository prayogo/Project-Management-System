<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation-icons/foundation-icons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/modernizr.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/attrchange.js"></script> 

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/fastclick.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.widget.min.js"></script>

<style type="text/css">
#footer{
  position:absolute;
  width:100%;
  left:0;
  right:0;
  margin-top:20px;
  background-color: #249C8E;
  padding-top:1px;
  padding-bottom:24px;
}
</style>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="page">
  <div style="background: #249C8E;border-bottom: 1px solid #e8e8e8;">
    <nav class="navbar " data-topbar data-options="is_hover: false">
      <h1><a class ="navbar-brand" href=""><b>Creates</b></a></h1>        
      <!-- <section class="top-bar-section">  -->
        <!-- Left Nav Section -->
        <ul class="nav navbar-nav navbar-left">
          <li class="no-select"><a id="menuTrigger" data-switch="hide"><span class="fi-thumbnails " ></span></a></li>          
        </ul>
        <!-- Right Nav Section-->
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
      <!-- </section> -->
    </nav>
  </div>
  <div id="mainmenu">
    <div class="row" style="margin-left:0px; margin-right:0px">
      <div class="medium-3 columns" style="background:#FAFAFA; border:1px solid #f3f3f3;float:left" id="containerLeft">
        <div class="sidebar" >
          <nav>
            <ul class="nav nav-sidebar">
              <li class="heading"><i class="fi-torsos"></i> User Management <a href="#" class="SidePanel no-select" data-switch="show" data-target="UM"><span class="fi-minus" ></span></a></li>              
              <li class="UM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('um/user') ?>"><i class="fi-torso"></i> Users</a></li>
              <li class="UM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('um/menu') ?>"><i class="fi-list"></i> Menus</a></li>
              <li class="UM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('um/group') ?>"><i class="fi-torsos-all"></i> Groups</a></li>
              <!--<li class="UM"><a class="sideItem"><i class="fi-key"></i> Group Access</a></li>
              <li class="UM"><a class="sideItem"><i class="fi-key"></i> User Access</a></li>-->
              <li class="heading"><i class="fi-clipboard-pencil"></i> Project Management <a href="#" class="SidePanel" data-switch="show" data-target="PM"><span class="fi-minus"></span></a></li>
              <li class="PM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('pms/customer') ?>"><i class="fi-torso-business"></i> Customers</a></li>
              <li class="PM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('pms/project') ?>"><i class="fi-clipboard-pencil"></i> Projects</a></li>
              <li class="PM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('pms/agreement') ?>"><i class="fi-page-multiple"></i> Agreements</a></li>
              <li class="PM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('pms/consultant') ?>"><i class="fi-results-demographics"></i> Consultants</a></li>
              <li class="PM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('pms/deliverables') ?>"><i class="fi-clipboard-notes"></i> External Deliverable</a></li>
              <li class="PM"><a class="sideItem" href="<?php echo Yii::app()->createUrl('pms/deliverables') ?>"><i class="fi-dollar"></i> External Payments</a></li>
              <li class="PM"><a class="sideItem"><i class="fi-clipboard-notes"></i> Internal Deliverable</a></li>
              <li class="PM"><a class="sideItem"><i class="fi-list-bullet"></i> Tasks</a></li>
              <li class="PM"><a class="sideItem"><i class="fi-monitor"></i> Monitoring</a></li>              
              <li class="heading"><i class="fi-graph-trend"></i> Report Generator <a style="float:right; font-size:10px; margin-top:3px; padding:0px 3px 0px 3px"></a></li>
            </ul>
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
      			'inactiveLinkTemplate'=>'<li class="current">{label}</li>',
      			'homeLink'=>'<li><a href="'.Yii::app()->homeUrl.'">Home</a></li>',
      			'separator'=>''
      			)); ?>
        <!-- breadcrumbs -->
        <?php endif?>
        <?php echo $content; ?> </div>
    </div>
  </div>
  <div class="clear"></div>
  <div id="footer"> 
	<div style="border-top:1px solid white; display:block; height:1px; padding-bottom:20px;"></div>
  	<div class="container wrapper" style="background-color:transparent">
        <div style="float:left; padding-left:24px;">
            <span style="color:white; font-size:20px;">Creates</span><br>
            <span style="color:white; font-size:12px;">© 2014, Inc. All rights reserved.</span>
        </div>
        <div style="float:right; padding-right:24px;">
            <a style="margin-left:10px"><i class="fi-social-facebook" style="color:white; font-size:40px;"></i></a>
            <a style="margin-left:10px"><i class="fi-social-linkedin" style="color:white; font-size:40px;"></i></a>
        </div>
        <div style="clear:both"></div>
  	</div>
  </div>
  <!-- footer --> 
</div>
<!-- page -->
</body>
</html>

<script>

	// $(document).foundation();

	$('.SidePanel').click(function(e){
		var target = '.'+$(this).attr('data-target');
		if ($(this).attr('data-switch') == 'hide'){
			$(target).slideDown();
			$(this).find('a').attr('class', 'fi-minus');
			$(this).attr('data-switch', 'show');
		}else{
			$(target).slideUp();
			$(this).find('a').attr('class', 'fi-plus');
			$(this).attr('data-switch', 'hide');
		}
	});
	
	function switchClick(){
		$('#menuTrigger').unbind('click');
		if ($('#menuTrigger').attr('data-switch') == 'hide'){
			$('#containerRight').css('width', '75%');
			$('.sidebar').slideDown();
			$('#menuTrigger').css('background','#2FB1A2');
			$('#menuTrigger').attr('data-switch', 'show');
		}else{
			$('.sidebar').slideUp(function(){
				$('#containerRight').css('width', '100%');
			});
			$('#menuTrigger').css('background','');
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