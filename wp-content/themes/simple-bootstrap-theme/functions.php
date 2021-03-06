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

	add_theme_support("custom-logo", [

		"width" => 90,
		"height" => 90,
		"flex_height" => true,
		"flex_width" => true
	]);

	// product thumbnail effect support
	add_theme_support("wc-product-gallery-zoom");
	add_theme_support("wc-product-gallery-lightbox");
	add_theme_support("wc-product-gallery-slider");
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

add_filter("woocommerce_show_page_title", "toggle_page_title");
function toggle_page_title($val){
$val = false;
return $val;
}


//add_action("woocommerce_after_shop_loop_item_title", "the_excerpt");


// removing elements from archive.product.php

remove_action("woocommerce_before_main_content", "woocommerce_breadcrumb", 20);
remove_action("woocommerce_before_shop_loop", "woocommerce_result_count", 20);
remove_action("woocommerce_before_shop_loop", "woocommerce_catalog_ordering", 30);

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'simple_bootstrap_theme_woocommerce_header_add_to_cart_fragment' );

function simple_bootstrap_theme_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items-count"><?php echo wc()->cart-> get_cart_contents_count();?></span>
	<?php
	$fragments['span.items-count'] = ob_get_clean();
	return $fragments;
}

function simple_bootstrap_theme_load_wp_customizer($wp_customize){
	// customizer code
	// adding section
	$wp_customize->add_section("sec_copyright", array(
		"title" => "Copyright Section",
		"description" => "This is a copyright section"
		
		
	));

	

// adding a setting
	$wp_customize->add_setting("set_copyright", array(
		"type" => "theme_mod",
		"default" => "This is a copyright section",
		"sanitize_callback" => "sanitize_text_field",
		));

		//add control
	$wp_customize->add_control("set_copyright", array(
		"label" => "copyright",
		"description" => "please fill the copyright text",
		"section" => "sec_copyright",
		"type" => "text",
		));

	//section of new arrivals/popularity


	$wp_customize->add_section("sec_product_panel", array(
		"title" => "Product panel limit & columns",
		"description" => "This is a product control panels"
		
		
	));

	

// adding a setting
	$wp_customize->add_setting("set_new_arrival_limit", array(
		"type" => "theme_mod",
		"default" => "",
		"sanitize_callback" => "absint",
		));

		//add control
	$wp_customize->add_control("set_new_arrival_limit", array(
		"label" => "New Arrival - product limit",
		"description" => "please provide the limit for new arrival",
		"section" => "sec_product_panel",
		"type" => "number",
		));

	$wp_customize->add_setting("set_new_arrival_column", array(
		"type" => "theme_mod",
		"default" => "",
		"sanitize_callback" => "absint",
		));

		//add control
	$wp_customize->add_control("set_new_arrival_column", array(
		"label" => "New Arrival - product column",
		"description" => "please provide the column for new arrival",
		"section" => "sec_product_panel",
		"type" => "number",
		));

	$wp_customize->add_setting("set_popular_limit", array(
		"type" => "theme_mod",
		"default" => "",
		"sanitize_callback" => "absint",
		));

		//add control
	$wp_customize->add_control("set_popular_limit", array(
		"label" => "Popularity - popular limit",
		"description" => "please provide the column for popularity",
		"section" => "sec_product_panel",
		"type" => "number",
		));

	$wp_customize->add_setting("set_popular_columns", array(
		"type" => "theme_mod",
		"default" => "",
		"sanitize_callback" => "absint",
		));

		//add control
	$wp_customize->add_control("set_popular_columns", array(
		"label" => "Popularity - popular column",
		"description" => "please provide the column for popularity",
		"section" => "sec_product_panel",
		"type" => "number",
		));
}

add_action ("customize_register", "simple_bootstrap_theme_load_wp_customizer");