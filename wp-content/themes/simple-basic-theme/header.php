<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<title><?php echo bloginfo('title') ?></title>
	<?php wp_head(); ?>
</head>
<meta charset="<?php echo bloginfo('charset') ?>">
<body>
<header>
	<section id="site-logo">Logo</section>
	<section id="site-menus">
		<?php 
		wp_nav_menu(array(
			"theme_location" => "theme_primary_menu"
		))
		?>
		<!-- <nav>
			<a href="#">Home</a>
			<a href="#">About us</a>
			<a href="#">Products</a>
			<a href="#">Contact us</a>
		</nav> -->
	</section>
</header>