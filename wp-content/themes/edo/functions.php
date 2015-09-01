<?php
define( 'THEME_DIR', trailingslashit(get_template_directory()));
define( 'THEME_URL', trailingslashit(get_template_directory_uri()));
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Edo 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}


if ( ! function_exists( 'kt_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Edo 1.0
 */
function kt_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'edo', get_template_directory() . '/languages' );

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu' => __( 'Primary Menu',      'edo' ),
		'vertical-menu'  => __( 'Vertical Menu', 'edo' ),
		'topbar-menu'  => __( 'Topbar Menu', 'edo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'kt_setup' );

/**
 * Register widget area.
 *
 * @since Edo 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kt_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kt_widgets_init' );


/**
 * Enqueue scripts and styles.
 *
 * @since Edo 1.0
 */
function kt_scripts() {

	/* CSS */

	// Bostrap style 
	wp_enqueue_style( 'bostrap-style', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap.min.css', array( ), '1.0' );
	// Font awesome style 
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.min.css', array( ), '1.0' );
	// OWl carousel style 
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/assets/lib/owl.carousel/owl.carousel.css', array( ), '1.0' );
	// Jquery Ui
	wp_enqueue_style( 'jquery-ui-style', get_template_directory_uri() . '/assets/lib/jquery-ui/jquery-ui.css', array( ), '1.0' );
	// Load our main stylesheet.
	wp_enqueue_style( 'edo-main-style', get_stylesheet_uri() );
	// Global style 
	wp_enqueue_style( 'edo-global-style', get_template_directory_uri() . '/assets/css/global.css', array( ), '1.0' );
	// Animate style 
	wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/assets/css/animate.css', array( ), '1.0' );
	// Edo style 
	wp_enqueue_style( 'edo-style', get_template_directory_uri() . '/assets/css/style.css', array( ), '1.0' );
	// responsive style 
	wp_enqueue_style( 'edo-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array( ), '1.0' );

	// Edo style Option 2
	wp_enqueue_style( 'edo-style-option2', get_template_directory_uri() . '/assets/css/option2.css', array( ), '1.0' );
	// Edo style Option 3
	wp_enqueue_style( 'edo-style-option3', get_template_directory_uri() . '/assets/css/option3.css', array( ), '1.0' );
	// Edo style Option 4
	wp_enqueue_style( 'edo-style-option-4', get_template_directory_uri() . '/assets/css/option4.css', array( ), '1.0' );

	/* JS*/
	// Bostrap
	wp_enqueue_script( 'edo-bootstrap-js', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	// OWL
	wp_enqueue_script( 'edo-owl-js', get_template_directory_uri() . '/assets/lib/owl.carousel/owl.carousel.min.js', array( 'jquery' ) );
	// Jquery Ui
	wp_enqueue_script( 'edo-jquery-ui-js', get_template_directory_uri() . '/assets/lib/jquery-ui/jquery-ui.min.js', array( 'jquery' ) );
	// COUNT DOWN
	wp_enqueue_script( 'edo-countdown-plugin-js', get_template_directory_uri() . '/assets/lib/countdown/jquery.plugin.js', array( 'jquery' ) );
	wp_enqueue_script( 'edo-countdown-js', get_template_directory_uri() . '/assets/lib/countdown/jquery.countdown.js', array( 'jquery' ) );
	// Main javasript
	wp_enqueue_script( 'edo-main-js', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ) );
	wp_enqueue_script( 'edo-actual-js', get_template_directory_uri() . '/assets/js/jquery.actual.min.js', array( 'jquery' ) );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'kt_scripts' );

require THEME_DIR . '/inc/utility.php';
require THEME_DIR . '/inc/woocommerce.php';

if( ! class_exists( 'wp_bootstrap_navwalker' ) && file_exists( THEME_DIR. '/inc/nav/wp_bootstrap_navwalker.php' ) ){
    require_once( THEME_DIR. '/inc/nav/wp_bootstrap_navwalker.php' );
}

if( ! class_exists( 'KT_MEGAMENU' ) && file_exists( THEME_DIR. '/inc/nav/nav.php' ) ){
    require_once( THEME_DIR. '/inc/nav/nav.php' );
}
