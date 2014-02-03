<?php 

if ( is_admin() ) {

	function remove_more_metaboxes() {
	
		if( !current_user_can('administrator') ) {
		//remove_meta_box( 'tlw_sidebar_options_tax-all', 'page', 'side' );	
		}
		
		remove_meta_box( 'tlw_sidebar_options_taxdiv', 'page', 'side' );	
		
	}
	
	add_action('admin_menu', 'remove_more_metaboxes');

}

?>