<?php
$uri_segments = $this->uri->total_segments();
$current_page_name = $this->uri->segment($uri_segments);
function isCurrentPage($_segment, $_current_page_name,$_uri_segments ){
	$current_page_name = "";
	$flag = false;
	if($_uri_segments == 0){
		$_current_page_name = "home";
	}
	if($_current_page_name == $_segment){
		return 	'class="current-menu-item"';
	}
	return 'false';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />  
	<meta name="description" content="<?php echo $seoDescription?>" />
	<meta name="keywords" content="<?php echo $seoKeywords ?>" />
	<meta name="author" content="<?php echo $seoAuthor ?>">
    <link rel="icon" href="<?php echo base_url(); ?>public/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>public/style/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>public/style/custom.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>public/style/prettyPhoto.css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,300,900' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>public/style/stylemobile.css" />
	<!-- <link rel="stylesheet" type="text/css" media="all" href="style/mobilenavigation.css" /> -->
	<script src="<?php echo base_url(); ?>public/script/modernizr.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>public/script/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/script/jquery-ui.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>public/script/jquery.flexslider.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>public/script/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/script/custom.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/script/ga.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function (){
        $(window).scroll(function () {
            if ($(document).scrollTop() <= 40) {
                $('#header-full').removeClass('small');
                $('.tabs-blur').removeClass('no-blur');
                $('#main-header').removeClass('small');
            } else {
                $('#header-full').addClass('small');
                $('.tabs-blur').addClass('no-blur');
                $('#main-header').addClass('small');
            }
        });
        
        $("a[data-rel^='prettyPhoto']").prettyPhoto({
			default_width: 600,
			default_height: 420,
			social_tools: false
		});
        $('#slideshow-tabs').tabs({ show: { effect: "fade", duration: 200 }, hide: { effect: "fade", duration: 300 } });
        $('.slider-tabs.flexslider').flexslider({
            animation: "slide",
            pauseOnAction: true,
        });
		$('a[data-rel]').each(function() {
			$(this).attr('rel', $(this).data('rel'));
		});
		$(".open-menu").click(function(){
		    $("body").addClass("no-move");
		});
		$(".close-menu, .close-menu-big").click(function(){
		    $("body").removeClass("no-move");
		});
	});
	</script>
</head>
<body class="home">
<?php	
/**************this is for session message***************/
$hasSessionMessageS = $this->session->userdata('message'); 
if($hasSessionMessageS != null or $hasSessionMessageS !=""){
?>
	<div class="sessionMessage">
    	<?php 
		echo $this->session->userdata('message'); 
		$this->session->unset_userdata('message');
		?>
    </div>
<?php		
}
?>
    <header id="main-header" class="clearfix">
        <div id="header-full" class="clearfix">
            <div id="header" class="clearfix">
                <a href="#nav" class="open-menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				    <span class="icon-bar"></span>
				</a>
                <a href="#" id="logo"><img src="<?php echo base_url(); ?>public/images/logo.png"  alt="logo" /></a>
                <aside id="header-content">
                	<form method="post" action="#" id="searchform" style="visibility:hidden">
                        <div>
                            <input type="text" name="search" class="input" />
                            <input type="submit" name="submitsearch" class="button" value="Search" />
                        </div>
                    </form>
                	<ul id="nav-header">
                        <?php
						$isLoggedIn =$this->session->userdata('isLoggedIn');
                        if($isLoggedIn){
						?>
                        	<li><a>Welcome <strong><?php echo $this->session->userdata('firstName') ?></strong></a></li>
                            <li><a href="<?php echo base_url(); ?>login_action/logout">Logout</a></li>
                       	<?php 
						}else{
						?> 
                        	<li><a href="<?php echo base_url(); ?>login">Login</a></li>
                    	<?php 
						}
						?>
                    </ul>
                    <h3 id="slogan">"Online Homework Assistant"</h3>
                </aside>
            </div>
        </div>
        <nav id="nav" class="clearfix">
            <a href="#" class="close-menu-big">Close</a>
            <div id="nav-container">
                <a href="#" class="close-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <ul id="nav-main">
                    <li <?php echo isCurrentPage('home', $current_page_name , $uri_segments); ?> ><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li <?php echo isCurrentPage('about_us', $current_page_name , $uri_segments); ?> ><a href="<?php echo base_url(); ?>about_us">About</a></li>
                    <li <?php echo isCurrentPage('testimonial', $current_page_name , $uri_segments); ?> ><a href="<?php echo base_url(); ?>testimonial">Testimonial</a></li>
                    <li <?php echo isCurrentPage('contact', $current_page_name , $uri_segments); ?> ><a href="<?php echo base_url(); ?>contact">Contact</a></li>
                    <li <?php echo isCurrentPage('samples', $current_page_name , $uri_segments); ?> ><a href="<?php echo base_url(); ?>samples">Samples</a></li>
                </ul>
                <?php
                if($isLoggedIn){	
				?>
                	<a href="<?php echo base_url(); ?>submit_assignment" id="button-registration">Assignment</a>
                <?php
				}else{	
				?>
                	<a href="<?php echo base_url(); ?>registration" id="button-registration">Registration</a>
            	<?php
				}
				?>
            </div>
        </nav>
    </header>