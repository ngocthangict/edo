<?php
/**
 * Plugin Name: Edo toolkit
 * Plugin URI: http://kutethemes.com/
 * Description: A Toolkit for edo theme.
 * Version: 1.0
 * Author: AngelsIT
 * Author URI: http://kutethemes.com/
 *
 * Text Domain: edo
 * Domain Path: /languages/
 *
 * @package edo
 * @since 1.0
 * @author AngelsIT
 */
 
define("KUTETHEME_PLUGIN_PATH", trailingslashit( plugin_dir_path(__FILE__) ) );
define("KUTETHEME_PLUGIN_URL", trailingslashit( plugin_dir_url(__FILE__) ) );


if( ! function_exists( 'edo_check_active_plugin' ) ){
    function edo_check_active_plugin( $key ){
        $active_plugins = (array) get_option( 'active_plugins', array() );
		if ( is_multisite() ){
		  $active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) ); 
		}
        return in_array( $key, $active_plugins ) || array_key_exists( $key, $active_plugins );
    }
}

load_plugin_textdomain( 'edo', false, plugin_basename( dirname( __FILE__ ) ) . "/languages" );


//Mailchimp
require_once KUTETHEME_PLUGIN_PATH.'mailchimp/mailchimp.php';

//CMB2
require_once KUTETHEME_PLUGIN_PATH .'cmb2/init.php';
require_once KUTETHEME_PLUGIN_PATH .'cmb2/kt_header_field_type.php';
require_once KUTETHEME_PLUGIN_PATH .'cmb2/kt_page_field_type.php';
require_once KUTETHEME_PLUGIN_PATH .'option_post_type.php';
require_once KUTETHEME_PLUGIN_PATH .'cmb2/admin.php';

// Woocommerce products filter
//require_once KUTETHEME_PLUGIN_PATH.'woocommerce-products-filter/index.php';

// Post types
require_once KUTETHEME_PLUGIN_PATH.'post-types/post-types.php';

/**
 * Initialising Visual Composer
 * 
 */ 
if ( edo_check_active_plugin( 'js_composer/js_composer.php' ) ) {
    if ( ! function_exists( 'js_composer_bridge_admin' ) ) {
		function js_composer_bridge_admin( $hook ) {
			wp_enqueue_style( 'js_composer_bridge', KUTETHEME_PLUGIN_URL . 'js_composer/css/style.css', array() );
		}
	}
    add_action( 'admin_enqueue_scripts', 'js_composer_bridge_admin', 15 );

    require_once KUTETHEME_PLUGIN_PATH . 'js_composer/custom-fields.php';
}

//Shortcodes
require_once KUTETHEME_PLUGIN_PATH.'shortcodes.php';

//Product brand
require_once KUTETHEME_PLUGIN_PATH.'brands/product_brand.php';

//Tax Metabox
require_once KUTETHEME_PLUGIN_PATH.'kt_tax_metabox.php';

