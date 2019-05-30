<?php
/**
 * Template part for displaying posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lazy_Blogs
 */

$lb_post_id       = get_the_id();
$lb_author        = get_the_author();
$lb_author_id     = get_post_field( 'post_author', $lb_post_id );
$lb_feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $lb_post_id ), 'full' );
$lb_image_url     = $lb_feature_image[0];
$lb_static_image  = esc_url( get_template_directory_uri() ) . "/images/pic01.jpg";
$lb_post_date     = get_the_date( "F j, Y", $lb_post_id );
$lb_avatar_url    = get_avatar_url( $lb_author_id );

?>
<article class="post">
	<header>
		<div class="title">
			<h2><a href="<?php echo esc_url( get_permalink( $lb_post_id ) ); ?>"><?php echo esc_html( get_the_title( $lb_post_id ) ) ?></a></h2>
		</div>

		<div class="meta">
			<time class="published"><?php echo esc_html( $lb_post_date ); ?></time>
			<a href="javascript:void(0)" class="author"><span class="name"><?php echo esc_html( $lb_author ); ?></span><img src="<?php echo esc_url( $lb_avatar_url ); ?>" alt="avatar-image"/></a>
		</div>

	</header>

	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php echo esc_url( get_permalink( $lb_post_id ) ); ?>" class="image featured"><?php the_post_thumbnail( 'featuredImageCropped' ); ?></a>
	<?php } else { ?>
		<a href="<?php echo esc_url( get_permalink( $lb_post_id ) ); ?>" class="image featured"><img src="<?php echo esc_url( $lb_static_image ); ?>" alt=""/></a>
	<?php } ?>
	<p><?php echo esc_html( get_the_excerpt( $lb_post_id ) ); ?></p>
	<footer>
		<ul class="actions">
			<li><a href="<?php echo esc_url( get_permalink( $lb_post_id ) ); ?>" class="button large"><?php esc_html_e( "Continue Reading", "lazy-blogs" ) ?></a></li>
		</ul>
		<ul class="stats">
			<?php
			$category        = get_the_category( $lb_post_id );
			$comments_number = get_comments_number( $lb_post_id );
			?>
			<li><a href="<?php echo esc_url( get_category_link( $category[0]->cat_ID ) ); ?>"><?php echo esc_html( $category[0]->name ); ?></a></li>
			<li><a href="javascript:void(0)" class="icon fa-comment"><?php echo esc_html( $comments_number ); ?></a></li>
		</ul>
	</footer>
</article>