<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/




// Retirar compressão WP das novas fotos a carregar
add_filter('jpeg_quality', function($arg){return 100;});


// Desligar função embed e respectivo js
function speed_stop_loading_wp_embed() {
if (!is_admin()) {
wp_deregister_script('wp-embed');
}
}
add_action('init', 'speed_stop_loading_wp_embed');


// Desligar query de versão WP

function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );



//
// ENFOLD
//
// Activar Custom CSS
add_theme_support('avia_template_builder_custom_css');

// Inactivar Layerslider
add_theme_support('deactivate_layerslider');

// Inactivar Portfolio
add_action('after_setup_theme', 'remove_portfolio');
function remove_portfolio() {
remove_action('init', 'portfolio_register');
}

