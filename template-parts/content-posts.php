<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lazy_Blogs
 */
global $posts;
$post_id = get_the_id();
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
	<article class="post">
		<header>
			<div class="title">
				<h2><a href="<?php echo get_permalink( $post_id ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a></h2>
			</div>
		</header>
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php echo get_permalink( $post_id ); ?>" class="image featured"><?php the_post_thumbnail('featuredImageCropped'); ?></a>
		<?php } else { ?>
			<a href="<?php echo get_permalink( $post_id ); ?>" class="image featured"><img src="<?php echo get_template_directory_uri() ?>/images/pic01.jpg" alt="" /></a>
		<?php } ?>
		<?php
			echo $posts[0]->post_content;
			echo "<hr />";
			comments_template( '' );
		?>
	</article>
	<!-- Post -->

</div>
