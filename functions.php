<?php 

if ( !function_exists(core_mods) ) {
	function core_mods() {
		if ( !is_admin() ) {
			wp_register_style( 'styles', get_stylesheet_uri() );
			wp_register_style( 'easydropdown_styles', get_stylesheet_directory_uri().'/_/css/easydropdown.metro.css' );
			wp_register_script( 'jquery-cookie', get_stylesheet_directory_uri() . '/_/js/jquery.cookie.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'slim-scroll', get_stylesheet_directory_uri() . '/_/js/jquery.slimscroll.min.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'easy-dropdown', get_stylesheet_directory_uri() . '/_/js/jquery.easydropdown.min.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'bootstrap-tabs', get_stylesheet_directory_uri() . '/_/js/bootstrap-tabs.js', array('jquery'), '1.0.0', true );
			wp_register_script( 'functions', get_stylesheet_directory_uri() . '/_/js/functions.js', array('jquery', 'jquery-ui-core', 'bootstrap-all-min', 'jquery-cookie', 'slim-scroll', 'bootstrap-tabs'), '1.0.1', true );
			//wp_register_script( 'img-fit', get_stylesheet_directory_uri() . '/_/js/jquery.imagefit.js', array('jquery'), '1.0.0', true );
			
			wp_enqueue_style('styles');
			wp_enqueue_style('easydropdown_styles');
			wp_enqueue_script('jquery-cookie');
			wp_enqueue_script('slim-scroll');
			wp_enqueue_script('easy-dropdown');
			wp_enqueue_script('bootstrap-tabs');
			wp_enqueue_script('functions');
			//wp_enqueue_script('img-fit');
		}
	}
	core_mods();
}

add_theme_support('html5', array('search-form'));


if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
			  'legal_links_menu' => 'Legal Menu',
			  'social_links_menu' => 'Footer Social Links',
			  'footer_menu_general' => 'Footer Menu General'
			)
		);
}

add_theme_support( 'post-thumbnails', array( 'page', 'post' ) );

$custom_header_args = array(
	'width'         => 1500,
	'flex-height' => true,
	'height'        => 600,
	'default-image' => get_stylesheet_directory_uri() . '/_/img/header.jpg',
	'uploads'       => true,
	'default-text-color' => '#fff',
	'header-text' => false
);
add_theme_support( 'custom-header', $custom_header_args );

function add_feat_img ( $post ) {	
	
	if (has_post_thumbnail($post->ID)) {
		$img_atts = array('class'	=> "img-responsive");
		
		echo get_the_post_thumbnail($post->ID ,'feat-img', $img_atts );
	
	} else {
		
		echo '<img src="'.get_stylesheet_directory_uri().'/_/img/default-featured-img.jpg" alt="TLW Solicitors>" class="img-responsive">';
		
	}
	
}

/* DE-REGISTER STYLES */
//include (STYLESHEETPATH . '/_/functions/de-register-styles.php');

/* REGISTER FEEDBACK CPT */
include (STYLESHEETPATH . '/_/functions/tlw_feedback_cpt.php');

/* REGISTER TEAMS CPT */
include (STYLESHEETPATH . '/_/functions/tlw_team_cpt.php');

/* REGISTER POSITIONS TAX */
include (STYLESHEETPATH . '/_/functions/tlw_positions_tax.php');

/* TAXONMY ORDERING */
include (STYLESHEETPATH . '/_/functions/tax_order.php');

/* REMOVE META BOXES */
//include (STYLESHEETPATH . '/_/functions/remove_meta_boxes.php');

/* AFC OPTIONS FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_options_functions.php');

/* TWITTER FEED */
//include (STYLESHEETPATH . '/_/functions/twitter-feed.php');

/* FORM ACTIONS */
//include (STYLESHEETPATH . '/_/functions/form_functions.php');
include (STYLESHEETPATH . '/_/functions/gform_functions.php');

/* AFC SAVE FUNCTIONS */
include (STYLESHEETPATH . '/_/functions/afc_save_post.php');

/* SEND NEWSLETTER TO DOTMAILER */
//include (STYLESHEETPATH . '/_/functions/submit_newsletter.php');

//holder_add_theme( 'wordpress', '333333', 'eeeeee' );
holder_add_theme( 'lite-gray', '888888', 'eeeeee' );
 ?>