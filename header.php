<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->
<head id="www-tlwsolicitors-co-uk" data-template-set="tlw-solicitors-theme">

	<meta charset="<?php bloginfo('charset'); ?>">
	<?php header('X-UA-Compatible: IE=edge,chrome=1'); ?>
	
	<?php if (wp_is_mobile()) { ?>
	<meta name="viewport" content="user-scalable=1.0,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=yes">
		   
	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-iphone.png" /> 
	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-ipad.png" /> 
	<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/_/img/touch-icon-ipad-retina.png" />
	<link rel="apple-touch-startup-image" href="<?php bloginfo('template_directory'); ?>/_/img/apple-start-up-img.png">
	<?php } ?>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
	
	<?php 
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
	global $post;
	?>
	
</head>

<body id="<?php echo $dir ?>" <?php body_class(); ?>>
	
	<!-- HEADER LOGO AND NAVIGATION -->
	<header class="header<?php echo (is_front_page()) ? ' abs':'' ?>">
		
		<div class="container">
		
		<div class="header-inner" style="background-color: white;">
			
				<div class="row">
				
					<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
						<h1 style="font-size: 16px; margin-left:15px;"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
					</div>
					
					<?php $freephone_num = get_field('freephone_num', 'option');?>
					<?php if (isset($freephone_num)) { ?>
					<div class="col-xs-12 col-sm-4 col-md-6 col-lg-6" style="text-align:center;">
					<span class="tel-num" style="font-size: 16px;"><i class="fa fa-mobile fa-lg"></i> <?php echo $freephone_num; ?></span>
					</div>
					<?php }  ?>
					
					<div class="hidden-xs col-sm-4 col-md-4 col-lg-4">
					<?php wp_nav_menu(array( 'container' => 'nav', 'container_id' => 'main-nav', 'theme_location' => 'main_menu', 'fallback_cb' => false ) ); ?>
					</div>
				
				</div>
				
				<?php if (!is_front_page()) { ?>
				
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<div id="breadcrumbs" style="background-color: black; color: white; padding: 5px 15px;">','</div>');
				} ?>	
				
				<?php }  ?>
			
		</div>
		
		</div>
				
	</header>
	
	<?php if (is_front_page()) { ?>
	
	<section id="home-banner">
	
		<div class="banner-wrap" style="background-color: Silver; max-width: 1500px; margin: auto;">
			
			<div class="container">
			<p class="tag-line" style="height:440px; padding-top: 170px; font-size: 50px; margin: 80px 0px;">For added TLC<br>think TLW Solicitors</p>
			</div>
			
		</div>

	</section>
	
	<?php } ?>
		
	<!-- MAIN CONTENT START -->
	<div class="container">
	
	<div class="content" <?php echo(is_front_page()) ? '':' style="background-color: white; padding: 30px 0px;"' ?>>