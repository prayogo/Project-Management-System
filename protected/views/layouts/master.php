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
<style type="text/css">
.page-sidebar #content {
margin-left:210px;
}

.page-sidebar-closed #nav-sidebar {
overflow:visible;
width:50px;
}

.page-sidebar-closed #nav-sidebar ul.submenu {
display:none!important;
position:relative;
top:34px;
padding-top:0!important;
}
  #nav-sidebar {
  position:fixed;
  width:210px;
  height:100%;
  z-index:500;
  background-color:#191c23;
  left:0;
  }

  #nav-sidebar ul.menu {
  list-style:none!important;
  margin:0;
  padding:0;
  }

  #nav-sidebar ul.menu li.maintab ul.submenu {
display:none;
background-color:#272c38;
padding:4px;
}

#nav-sidebar ul.menu li.maintab ul.submenu li {
list-style:none!important;
}

#nav-sidebar ul.menu li.maintab ul.submenu li a {
color:#c3c5ca;
display:block;
background-color:#383f50;
border-bottom:#232732 solid 1px;
padding:3px 8px;
}

#nav-sidebar ul.menu li.maintab ul.submenu li a:hover {
color:#fff;
text-decoration:none;
background-color:#232732;
-webkit-box-shadow:#00aff0 -4px 0 0 0 inset;
box-shadow:#00aff0 -4px 0 0 0 inset;
}

#nav-sidebar ul.menu li.maintab a {
white-space:nowrap;
text-overflow:ellipsis;
overflow:hidden;
}

#nav-sidebar ul.menu li.maintab>a.title {
display:block;
position:relative;
height:34px;
border-bottom:#232732 solid 1px;
background-color:#383f50;
color:#c3c5ca;
line-height:34px;
text-transform:uppercase;
text-decoration:none;
-webkit-transition-property:background-color;
transition-property:background-color;
-webkit-transition-duration:.2s;
transition-duration:.2s;
-webkit-transition-timing-function:ease-out;
transition-timing-function:ease-out;
padding:0 .35em;
}

#nav-sidebar ul.menu li.maintab>a.title i {
width:42px;
font-size:28px;
vertical-align:middle;
color:#878b96;
-webkit-transition-property:color;
transition-property:color;
-webkit-transition-duration:.4s;
transition-duration:.4s;
-webkit-transition-timing-function:ease-out;
transition-timing-function:ease-out;
}

#nav-sidebar ul.menu li.maintab.hover>a.title,#nav-sidebar ul.menu li.maintab:hover:not(.hover)>a.title {
background-color:#272c38;
color:#fff;
}

#nav-sidebar ul.menu li.maintab.hover ul.submenu {
position:absolute;
display:block;
width:200px;
top:0;
z-index:600;
left:210px;
}
.page-sidebar-closed #nav-sidebar li.maintab.active ul.submenu {
border:none!important;
}

.page-sidebar-closed #nav-sidebar>ul>li.maintab:hover {
width:250px!important;
position:relative;
z-index:500;
}

.page-sidebar-closed #nav-sidebar>ul>li.maintab:hover ul.submenu {
position:absolute!important;
display:block!important;
top:34px!important;
width:200px!important;
left:50px;
}

.page-sidebar-closed #content {
margin-left:55px;
}

.page-sidebar-closed #content h2.page-title {
white-space:nowrap;
padding:26px 0 0 120px;
}

.page-sidebar-closed #content ul.page-breadcrumb {
left:120px!important;
}
@media min-height 850px{
body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab.active ul.submenu {
display:block;
background-color:#fff;
border-right:1px solid #e6e6e6;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab.active ul.submenu a {
background-color:#fff;
color:#00aff0;
border-bottom:solid 1px #d8f3fc;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab.active ul.submenu a:hover {
color:#00aff0;
border-bottom:solid 1px #d8f3fc;
background-color:#d8f3fc;
text-decoration:none;
-webkit-box-shadow:#fff 0 -1px;
box-shadow:#fff 0 -1px;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab.active ul.submenu li:last-child a {
border-bottom:solid 1px #fff;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab.active ul.submenu li.active a {
color:#fff;
background-color:#00aff0;
position:relative;
top:-1px;
border-top:solid 1px #fff;
border-bottom:solid 1px #00aff0;
}
}

@media max-height 850px{
body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab>a.title {
font-size:12px;
height:28px;
line-height:28px;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab>a.title i {
vertical-align:baseline;
width:18px;
font-size:14px;
text-align:right;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab ul.submenu {
padding:1px 1px 0;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab ul.submenu li a {
height:26px;
line-height:26px;
padding:0 6px;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab.active ul.submenu {
display:none;
}

body:not(.page-sidebar-closed) #nav-sidebar ul.menu li.maintab.active.hover ul.submenu {
position:absolute;
display:block;
width:200px;
z-index:600;
left:210px;
top:0;
}

}</style>

<nav id="nav-sidebar" role="navigation">
    <ul class="menu">
      <li class="maintab has_submenu" id="maintab-UM" data-submenu="1">
        <a href="#" class="title">            
          <i class="fi-torsos"></i> User Management
        </a>
        <ul class="submenu">
          <li id="subtab-Users" >
            <a href="<?php echo Yii::app()->createUrl('um/user') ?>"><i class="fi-torso"></i> Users</a>
          </li>
          <li id="subtab-Menus" >
            <a href="<?php echo Yii::app()->createUrl('um/menu') ?>"><i class="fi-list"></i> Menus</a>
          </li>
          <li id="subtab-Groups">
            <a href="<?php echo Yii::app()->createUrl('um/group') ?>"><i class="fi-torsos-all"></i> Groups</a>
          </li>        
        </ul>
      </li>
      <li class="maintab has_submenu" id="maintab-PM" data-submenu="2">
        <a href="#" class="title">            
          <i class="fi-clipboard-pencil"></i> Project Management
        </a>
        <ul class="submenu">
          <li id="subtab-Customers" >
            <a href="<?php echo Yii::app()->createUrl('pms/customer') ?>"><i class="fi-torso-business"></i> Customers</a>
          </li>
          <li id="subtab-Projects" >
            <a href="<?php echo Yii::app()->createUrl('pms/project') ?>"><i class="fi-clipboard-pencil"></i> Projects</a>
          </li>
          <li id="subtab-Agreements">
            <a href="<?php echo Yii::app()->createUrl('pms/agreement') ?>"><i class="fi-page-multiple"></i> Agreements</a>
          </li>
          <li id="subtab-Consultants">
            <a href="<?php echo Yii::app()->createUrl('pms/consultant') ?>"><i class="fi-results-demographics"></i> Consultants</a>
          </li>
          <li id="subtab-External-Deliverables">
            <a href="<?php echo Yii::app()->createUrl('pms/deliverables') ?>"><i class="fi-clipboard-notes"></i> External Deliverables</a>
          </li>
          <li id="subtab-External-Payments">
            <a href="<?php echo Yii::app()->createUrl('pms/payments') ?>"><i class="fi-dollar"></i> External Payments</a>
          </li>
          <li id="subtab-Internal-Deliverables">
            <a href="<?php echo Yii::app()->createUrl('pms/payments') ?>"><i class="fi-clipboard-notes"></i> Internal Deliverables</a>
          </li>
          <li id="subtab-Tasks">
            <a href="<?php echo Yii::app()->createUrl('pms/payments') ?>"><i class="fi-list-bullet"></i> Tasks</a>
          </li>
          <li id="subtab-Monitoring">
            <a href="<?php echo Yii::app()->createUrl('pms/payments') ?>"><i class="fi-monitor"></i> Monitoring</a>
          </li>
        </ul>
      </li>
      <li class="maintab" id="maintab-RG" data-submenu="3">
        <a class="title" href="<?php echo Yii::app()->createUrl('rg/generator') ?>"><i class="fi-graph-trend"></i> Report Generator</a>
      </li>
    </ul>
    <span class="menu-collapse">
      <i class="fi-graph-trend"></i>
    </span>
  </nav>


  <div id="mainmenu">
    <div style="margin-left:0px; margin-right:0px">
      <div style="background:#FAFAFA; border:1px solid #f3f3f3;float:left" id="containerLeft">
        <!-- <div class="sidebar" >
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
        <i class="fi-graph-trend"></i>Report Generator</a>
        </div>
            </div>
          </nav>
        </div> -->
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
</nav>
  
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

<script>
$(document).ready(function() {
  //set main navigation aside
  /* global employee_token */
  function navSidebar(){
    var sidebar = $('#nav-sidebar');
    sidebar.off();
    $('.expanded').removeClass('expanded');
    $('.maintab').not('.active').closest('.submenu').hide();
    sidebar.on('click','.submenu_expand', function(){
      var $navId = $(this).parent();
      $('.submenu-collapse').remove();
      if($('.expanded').length ){
        $('.expanded > ul').slideUp('fast', function(){
          var $target = $('.expanded');
          $target.removeClass('expanded');
          $($navId).not($target).not('.active').addClass('expanded');
          $($navId).not($target).not('.active').children('ul:first').hide().slideDown();
        });
      }
      else {
        $($navId).not('.active').addClass('expanded');
        $($navId).not('.active').children('ul:first').hide().slideDown();
      }
    });
    //sidebar menu collapse
    sidebar.find('.menu-collapse').on('click',function(){
      $('body').toggleClass('page-sidebar-closed');
      $('.expanded').removeClass('expanded');      
    });
  }

  
  //init main navigation
  function initNav(){
    if ($('body').hasClass('page-sidebar')){
      navSidebar();
    }
  }


  var ellipsed = [];
  initNav();

  // prevent mouseout + direct path to submenu on sidebar uncollapsed navigation + avoid out of bounds
  var closingMenu, openingMenu;
  $('li.maintab.has_submenu').hover(function() {
    var submenu = $(this);
    if (submenu.is('.active') && submenu.children('ul.submenu').is(':visible')) {
      return;
    }
    clearTimeout(openingMenu);
    clearTimeout(closingMenu);
    openingMenu = setTimeout(function(){
      $('li.maintab').removeClass('hover');
      $('ul.submenu.outOfBounds').removeClass('outOfBounds').css('top',0);
      submenu.addClass('hover');
      var h = $( window ).height();
      var x = submenu.find('.submenu li').last().offset();
      var l = x.top + submenu.find('.submenu li').last().height();
      var f = 25;
      if ($('#footer').is(':visible')){
        f = $('#footer').height() + f;
      }
      var s = $(document).scrollTop();
      var position = h - l - f + s;
      var out = false;
      if ( position < 0) {
        out = true;
        submenu.find('.submenu').addClass('outOfBounds').css('top', position);
      }
    },50);
  }, function() {
    var submenu = $(this);
    closingMenu = setTimeout(function(){
      submenu.removeClass('hover');
    },250);
  });

  $('ul.submenu').on('mouseenter', function(){
    clearTimeout(openingMenu);
  });

  //media queries - depends of enquire.js
  /*global enquire*/
  // enquire.register('screen and (max-width: 1200px)', {
  //   match : function() {
  //     if( $('#main').hasClass('helpOpen')) {
  //       $('.toolbarBox a.btn-help').trigger('click');
  //     }
  //   },
  //   unmatch : function() {
      
  //   }
  // });
  // enquire.register('screen and (max-width: 768px)', {
  //   match : function() {

  //     $('body.page-sidebar').addClass('page-sidebar-closed');
  //   },
  //   unmatch : function() {
  //     $('body.page-sidebar').removeClass('page-sidebar-closed');
  //   }
  // });
  // enquire.register('screen and (max-width: 480px)', {
  //   match : function() {
  //     $('body').addClass('mobile-nav');
  //     mobileNav();
  //   },
  //   unmatch : function() {
  //     $('body').removeClass('mobile-nav');
  //     removeMobileNav();
  //   }
  // });


}); 

</script>