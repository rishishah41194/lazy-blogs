<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lazy_Blogs
 */
get_header();

?>
	<!-- Menu -->
	<section id="menu">

		<!-- Search -->
		<section>
			<form class="search" method="get" action="#">
				<input type="text" name="query" placeholder="Search" />
			</form>
		</section>

		<!-- Links -->
		<section>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => 'ul',
				'menu_class'=> 'links'
			));
			?>
		</section>

	</section>

	<!-- Main -->
	<div id="main">

		<!-- Post -->
		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content', "" );
			}

			echo "<div class='pagination-links'>";
				posts_nav_link();
			echo "</div>";

		}
		?>
		<!-- Post -->

	</div>

<?php
get_footer();
