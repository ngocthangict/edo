<?php
define( 'THEME_DIR', trailingslashit( get_template_directory() ));
define( 'THEME_URL', trailingslashit( get_template_directory_uri() ));
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Edo 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
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

	/*`
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on edo, use a find and replace
	 * to change 'edo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'edo', THEME_DIR . '/languages' );

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
	set_post_thumbnail_size( 870, 400, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'               => esc_attr__( 'Primary Menu',      'edo' ),
		'vertical-menu'              => esc_attr__( 'Vertical Menu', 'edo' ),
		'topbar-menu'                => esc_attr__( 'Topbar Menu', 'edo' ),
		'single-product-custom-menu' => esc_attr__( 'Single Product Custom link', 'edo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
    
	// Image size
	add_image_size ( 'edo-blog-thumb-small', 229, 105, true );
}
endif; // edo setup
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
		'name'          => esc_attr__( 'Widget Area', 'edo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_attr__( 'Add widgets here to appear in your sidebar.', 'edo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_attr__( 'Widget Shop Area', 'edo' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_attr__( 'Add widgets here to appear in your sidebar.', 'edo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Widget Shop single Area', 'edo' ),
		'id'            => 'sidebar-shop-single',
		'description'   => esc_attr__( 'Add widgets here to appear in your sidebar.', 'edo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
        'name'          => esc_attr__( 'Footer Menu 1', 'edo'),
        'id'            => 'footer-menu-1',
        'description'   => esc_attr__( 'The footer menu 1 widget area', 'edo'),
        'before_widget' => '<div id="%1$s" class="widget-container widget-footer-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_attr__( 'Footer Menu 2', 'edo'),
        'id'            => 'footer-menu-2',
        'description'   => esc_attr__( 'The footer menu 2 widget area', 'edo'),
        'before_widget' => '<div id="%1$s" class="widget-container widget-footer-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_attr__( 'Footer Menu 3', 'edo'),
        'id'            => 'footer-menu-3',
        'description'   => esc_attr__( 'The footer menu 3 widget area', 'edo'),
        'before_widget' => '<div id="%1$s" class="widget-container widget-footer-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_attr__( 'Footer Menu 4', 'edo'),
        'id'            => 'footer-menu-4',
        'description'   => esc_attr__( 'The footer menu 4 widget area', 'edo'),
        'before_widget' => '<div id="%1$s" class="widget-container widget-footer-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => esc_attr__( 'Footer Menu 5', 'edo'),
        'id'            => 'footer-menu-5',
        'description'   => esc_attr__( 'The footer menu 5 widget area', 'edo'),
        'before_widget' => '<div id="%1$s" class="widget-container widget-footer-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    
    
    register_sidebar( array(
        'name'          => esc_attr__( 'Footer Menu 6', 'edo'),
        'id'            => 'footer-menu-6',
        'description'   => esc_attr__( 'The footer menu 6 widget area', 'edo' ),
        'before_widget' => '<div id="%1$s" class="widget-container widget-footer-menu %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
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
	wp_enqueue_style( 'bostrap-style', THEME_URL . '/assets/lib/bootstrap/css/bootstrap.min.css', array( ), '1.0' );
	// Font awesome style 
	wp_enqueue_style( 'font-awesome-style', THEME_URL . '/assets/lib/font-awesome/css/font-awesome.min.css', array( ), '1.0' );
	// OWl carousel style 
	wp_enqueue_style( 'owl-carousel-style', THEME_URL . '/assets/lib/owl.carousel/owl.carousel.css', array( ), '1.0' );
	// Jquery Ui
	wp_enqueue_style( 'jquery-ui-style', THEME_URL . '/assets/lib/jquery-ui/jquery-ui.css', array( ), '1.0' );
	wp_enqueue_style( 'fancyBox-style', THEME_URL . '/assets/lib/fancyBox/jquery.fancybox.css', array( ), '1.0' );
	// Load our main stylesheet.
	wp_enqueue_style( 'edo-main-style', get_stylesheet_uri() );
	// Global style 
	wp_enqueue_style( 'edo-global-style', THEME_URL . '/assets/css/global.css', array( ), '1.0' );
	// Animate style 
	wp_enqueue_style( 'animate-style', THEME_URL . '/assets/css/animate.css', array( ), '1.0' );
	// Edo style 
	wp_enqueue_style( 'edo-style', THEME_URL . '/assets/css/style.css', array( ), '1.0' );
	// Woo style 
	wp_enqueue_style( 'woo-style', THEME_URL . '/assets/css/woocommerce.css', array( ), '1.0' );
	// Megamenu style 
	wp_enqueue_style( 'megamenu-style', THEME_URL . '/assets/css/megamenu.css', array( ), '1.0' );
	// responsive style 
	wp_enqueue_style( 'edo-responsive-style', THEME_URL . '/assets/css/responsive.css', array( ), '1.0' );

	// Edo style Option 2
	wp_enqueue_style( 'edo-style-option2', THEME_URL . '/assets/css/option2.css', array( ), '1.0' );
	// Edo style Option 3
	wp_enqueue_style( 'edo-style-option3', THEME_URL . '/assets/css/option3.css', array( ), '1.0' );
	// Edo style Option 4
	wp_enqueue_style( 'edo-style-option-4', THEME_URL . '/assets/css/option4.css', array( ), '1.0' );

	/* JS*/
	// Bostrap
	wp_enqueue_script( 'edo-bootstrap-js', THEME_URL . '/assets/lib/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );
	// OWL
	wp_enqueue_script( 'edo-owl-js', THEME_URL . '/assets/lib/owl.carousel/owl.carousel.min.js', array( 'jquery' ) );
	// Jquery Ui
	wp_enqueue_script( 'edo-jquery-ui-js', THEME_URL . '/assets/lib/jquery-ui/jquery-ui.min.js', array( 'jquery' ) );
	// fancyBox
	wp_enqueue_script( 'edo-fancyBox-js', THEME_URL . '/assets/lib/fancyBox/jquery.fancybox.js', array( 'jquery' ) );
	// COUNT DOWN
	wp_enqueue_script( 'edo-countdown-plugin-js', THEME_URL . '/assets/lib/countdown/jquery.plugin.js', array( 'jquery' ) );
	wp_enqueue_script( 'edo-countdown-js', THEME_URL . '/assets/lib/countdown/jquery.countdown.js', array( 'jquery' ) );
	// Main javasript
	wp_enqueue_script( 'edo-main-js', THEME_URL . '/assets/js/script.js', array( 'jquery' ) );
	wp_enqueue_script( 'edo-actual-js', THEME_URL . '/assets/js/jquery.actual.min.js', array( 'jquery' ) );

    wp_localize_script( 'edo-main-js', 'ajax_frontend', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'ajax_frontend' ),
        'current_date' => date_i18n('Y-m-d H:i:s')
    ));
    /*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', THEME_URL ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kt_scripts' );


add_action( 'admin_enqueue_scripts', 'edo_enqueue_script' );

if( ! function_exists("edo_enqueue_script")){
    function edo_enqueue_script(){
        wp_register_style( 'framework-core', THEME_URL.'assets/css/framework-core.css');
        wp_enqueue_style( 'framework-core');
        
        wp_enqueue_script( 'kt_image', THEME_URL.'assets/js/kt_image.js', array('jquery'), '1.0.0', true);
        
        wp_localize_script( 'kt_image', 'kt_image_lange', array(
            'frameTitle' => esc_attr__( 'Select your image', 'edo' )
        ));                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
        
        wp_register_script( 'framework-core', THEME_URL.'assets/js/framework-core.js', array('jquery', 'jquery-ui-tabs'), '1.0.0', true);
        wp_enqueue_script('framework-core');
        
        wp_enqueue_media();
    }
}

if(!function_exists('edo_comment')){
	function edo_comment($comment, $args, $depth){
		$GLOBALS['comment'] = $comment;
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div class="comment-avatar">
				 <?php echo get_avatar( $comment); ?>
			</div>
			<div class="comment-content">
				<div class="comment-meta">
					<span class="comment-author"><?php printf( '%s', get_comment_author_link()) ?></span>
					<span class="comment-date"><?php comment_date(); ?> <?php esc_html_e('at','edo');?> <?php comment_time(); ?></span>
				</div>
				<div class="comment-entry">
					<?php comment_text(); ?>
				</div>
				<div class="comment-actions">
					<?php 
		            comment_reply_link( array_merge( $args, array( 
					'reply_text' => '<i class="fa fa-share"></i> '.__('Reply','edo'),
					'depth'      => $depth,
					'max_depth'  => $args['max_depth'] 
		            ) ) ); 
		            ?>
				</div>
			</div>
		</li>
		<?php
	}
}

if ( ! function_exists( 'edo_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since edo 1.0
 */
function edo_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'edo' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_attr__( 'Older Comments', 'edo' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_attr__( 'Newer Comments', 'edo' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;




if( ! class_exists( 'wp_bootstrap_navwalker' ) && file_exists( THEME_DIR. '/inc/nav/wp_bootstrap_navwalker.php' ) ){
    require_once( THEME_DIR. '/inc/nav/wp_bootstrap_navwalker.php' );
}

if( ! class_exists( 'KT_MEGAMENU' ) && file_exists( THEME_DIR. '/inc/nav/nav.php' ) ){
    require_once( THEME_DIR. '/inc/nav/nav.php' );
}

/**
 * Implement the Custom Header feature.
 *
 * @since edo 1.0
 */
//require THEME_DIR . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 *
 * @since edo 1.0
 */
//require THEME_DIR . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since edo 1.0
 */
//require THEME_DIR . '/inc/customizer.php';

/**
 * Commond function
 * @since edo 1.0
 * */
require THEME_DIR . '/inc/utility.php';
/**
 * Customizer woocommerce
 * */
require THEME_DIR . '/inc/woocommerce.php';
/**
 * Register Widget
 * */
require THEME_DIR . '/inc/widget.php';
/**
 * Breadcrumbs
 * */
require THEME_DIR . '/inc/breadcrumbs.php';

/**
 * Recommend plugins
 * */
require THEME_DIR . '/inc/recommend-plugins.php';

/**
 * Theme color
 * */
require THEME_DIR . '/inc/theme-color.php';
