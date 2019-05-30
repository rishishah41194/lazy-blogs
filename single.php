<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lazy_Blogs
 */

get_header();
get_template_part( 'template-parts/content', 'posts' );
get_footer();
