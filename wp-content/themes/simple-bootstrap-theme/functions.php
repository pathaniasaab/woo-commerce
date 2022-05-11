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
	add_theme_support("woocommerce", array("thumbnail" => 150, "single_image_width" => 200, "product_grid" => array("default_columns" => 10,
"min_columns" => 2,
"max_columns" => 3)));
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
remove_action("woocommerce_sidebar", "woocommerce_get_sidebar");

// add container & row class
function open_container_row_div_classes(){
echo "<div class = 'container'><div class = 'row'>";
}
add_action("woocommerce_before_main_content", "open_container_row_div_classes", 5);


function close_container_row_div_classes(){
echo "</div></div>";
}
add_action("woocommerce_after_main_content", "close_container_row_div_classes", 5);



add_action("template-redirect", "load_template_layout");
function load_template_layout(){
	if(is_shop()){//true
//col-sm-4 => Sidebar
//col-sm-8 => Products Grid
/* Creating Sidebar */
//<div class"col-sm-4">Sidebar</div>
add_action("woocommerce_before_main_content", "open_sidebar_column_grid", 6);
function open_sidebar_column_grid(){
	echo "<div class = 'col-sm-4'>";
}
add_action("woocommerce_before_main_content", "woocommerce_get_sidebar", 7);
add_action("woocommerce_before_main_content", "close_sidebar_column_grid", 8);
function close_sidebar_column_grid(){
	echo "</div>";
}
//<div class"col-sm-4">Product Grid</div>
add_action("woocommerce_before_main_content", "open_product_column_grid", 9);
function open_product_column_grid(){
	echo "<div class = 'col-sm-8'>";
}
add_action("woocommerce_before_main_content", "close_product_column_grid", 10);
function close_product_column_grid(){
	echo "</div>";
}
	}
}