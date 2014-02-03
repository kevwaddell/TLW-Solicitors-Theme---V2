<?php

add_action( 'wp_print_scripts', 'my_deregister_styles', 100 );

function my_deregister_styles() {
wp_deregister_style( 'wp-pagenavi-style-css' );
} 

?>