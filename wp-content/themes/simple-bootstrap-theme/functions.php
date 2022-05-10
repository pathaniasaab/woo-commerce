<?php
function simple_bootstrap_theme_load_scripts(){
// css files
	wp_enqueue_style("style", get_template_directory_uri()."/assets/css/styles.css", array(), "1.0", "all");
	
    wp_enqueue_script("bootstrap", get_template_directory_uri()."/assets/js/script.js", array("jquery"), "1.0", true );
}

add_action("wp_enqueue_scripts", "simple_bootstrap_theme_load_scripts");

// register nav menu

function simple_bootstrap_theme_nav_config(){
	register_nav_menus(array(
		"sbt_primary_menu_id" => "SBT Primary Menu (Top Menu)",
		"sbt_secondary_menu_id" => "SBT Sidebar"
		
	));
	// add theme support
	add_theme_support("post-thumbnails");
}
add_action("after_setup_theme", "simple_bootstrap_theme_nav_config");

// adding classes for li
function simple_bootstrap_theme_add_li_class($classes, $item, $args){
$classes[] = "nav-item";
return $classes;
} 
add_filter("nav_menu_css_class", "simple_bootstrap_theme_add_li_class", 1, 3);

// adding classes for anchor links

function simple_bootstrap_theme_add_anchor_links($classes, $item, $args){
$classes['class'] = "nav-link";
return $classes;
} 
add_filter("nav_menu_link_attributes", "simple_bootstrap_theme_add_anchor_links", 1, 3);