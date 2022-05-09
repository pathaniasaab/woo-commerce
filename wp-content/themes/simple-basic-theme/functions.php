<?php
function basic_simple_theme_load_scripts(){
// attach theme.css
	wp_enqueue_style("theme-css", get_template_directory_uri()."/assets/css/theme.css", array(), "1.0", "all");
	// attach style.css
	wp_enqueue_style("theme-style", get_stylesheet_uri(), array(), "1.0", "all");
	// script.js
    wp_enqueue_script("script.js", get_template_directory_uri()."/assets/js/script.js", array("jquery"), "1.0", true );

}

add_action("wp_enqueue_scripts", "basic_simple_theme_load_scripts");

// register nav menu

function simple_basic_theme_nav_config(){
	register_nav_menus(array(
		"theme_primary_menu" => "Primary menu SBT",
		"theme_footer_menu" => "Primary footer SBT",
		"theme_sidebar_menu" => "Left sidebar SBT"
	));
}
add_action("after_setup_theme", "simple_basic_theme_nav_config");

