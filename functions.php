<?php
/**
 * Lazy Blogs functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lazy_Blogs
 */

if ( ! function_exists( 'lazy_blogs_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lazy_blogs_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Lazy Blogs, use a find and replace
		 * to change 'lazy-blogs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lazy-blogs', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'lazy-blogs' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lazy_blogs_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'lazy_blogs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lazy_blogs_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'lazy_blogs_content_width', 640 );
}

add_action( 'after_setup_theme', 'lazy_blogs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lazy_blogs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lazy-blogs' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lazy-blogs' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'lazy_blogs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lazy_blogs_scripts() {

	wp_enqueue_style( 'lazy-blogs-main', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'lazy-blogs-style', get_stylesheet_uri() );
	wp_enqueue_script("jquery");
	wp_enqueue_script( 'lazy-blogs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'lazy-blogs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'browser-min', get_template_directory_uri() . '/assets/js/browser.min.js', array(), '', true );
	wp_enqueue_script( 'breakpoints-min', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array(), '', true );
	wp_enqueue_script( 'util', get_template_directory_uri() . '/assets/js/util.js', array(), '', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'lazy_blogs_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_image_size( 'featuredImageCropped', 1398, 568, true );

function mytheme_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'lb_footer_settings', array(
		'title'      => __( 'Footer Settings', 'lazy-blogs' ),
		'capability' => 'edit_theme_options',
		'priority'   => 120,
	) );

	//  =============================
	//  = Copyright Text =
	//  =============================
	$wp_customize->add_setting( 'lb_copyright_text', array(
		'default'    => '',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lb_copyright_text', array(
		'label'    => __( 'Copyright Text', 'lazy-blogs' ),
		'section'  => 'lb_footer_settings',
		'type'     => 'text',
		'settings' => 'lb_copyright_text',
	) ) );

	//  =============================
	//  = Facebook Icon Link =
	//  =============================
	$wp_customize->add_setting( 'lb_facebook_link', array(
		'default'    => '',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lb_facebook_link', array(
		'label'    => __( 'Facebook Link', 'lazy-blogs' ),
		'section'  => 'lb_footer_settings',
		'type'     => 'text',
		'settings' => 'lb_facebook_link',
	) ) );

	//  =============================
	//  = Instagram Icon Link =
	//  =============================
	$wp_customize->add_setting( 'lb_instagram_link', array(
		'default'    => '',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lb_instagram_link', array(
		'label'    => __( 'Instagram Link', 'lazy-blogs' ),
		'section'  => 'lb_footer_settings',
		'type'     => 'text',
		'settings' => 'lb_instagram_link',
	) ) );

	//  =============================
	//  = Twitter Icon Link =
	//  =============================
	$wp_customize->add_setting( 'lb_twitter_link', array(
		'default'    => '',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'lb_twitter_link', array(
		'label'    => __( 'Twitter Link', 'lazy-blogs' ),
		'section'  => 'lb_footer_settings',
		'type'     => 'text',
		'settings' => 'lb_twitter_link',
	) ) );

}

add_action( 'customize_register', 'mytheme_customize_register' );
