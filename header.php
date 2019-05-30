<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lazy_Blogs
 */

wp_head();

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>
<body class="is-preload">

<!-- Wrapper -->
<div id="wrapper">

	<!-- Header -->
	<header id="header">
		<h1><a href="<?php echo esc_url( get_bloginfo( 'url' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
		<?php
		wp_nav_menu( array(
			'theme_location' => 'primary',
			'container'      => '',
			'menu_class'     => 'links',
		));
		?>
		<nav class="main">
			<ul>
				<li class="menu">
					<a class="fa-bars" href="#menu">Menu</a>
				</li>
			</ul>
		</nav>
	</header>

