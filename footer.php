<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lazy_Blogs
 */
?>
</div>
<?php

$lb_copyright_text = get_theme_mod( 'lb_copyright_text' );
$lb_facebook_link = get_theme_mod( 'lb_facebook_link' );
$lb_instagram_link = get_theme_mod( 'lb_instagram_link' );
$lb_twitter_link = get_theme_mod( 'lb_twitter_link' );

?>
	<!-- Footer -->
	<section id="footer">
		<ul class="icons">
			<?php
				echo !empty( $lb_facebook_link ) ? "<li><a href='$lb_facebook_link' class='fa-facebook' target='_blank'><span class='label'>Facebook</span></a></li>" : "";
				echo !empty( $lb_twitter_link ) ? "<li><a href='$lb_twitter_link' class='fa-twitter' target='_blank'><span class='label'>Twitter</span></a></li>" : "";
				echo !empty( $lb_instagram_link ) ? "<li><a href='$lb_instagram_link' class='fa-instagram' target='_blank'><span class='label'>Instagram</span></a></li>" : "";
			?>
		</ul>
		<p class="copyright"><?php echo isset( $lb_copyright_text ) ? $lb_copyright_text : ""; ?></p>
	</section>

</body>
</html>

<?php wp_footer(); ?>