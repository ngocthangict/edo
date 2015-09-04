<?php
/**
 * Remove noties of wootheme update
 * */
if(is_admin())
    remove_action( 'admin_notices', 'woothemes_updater_notice' );

/**
 * Mini cart
 * */
add_action( 'edo_mini_cart', 'woocommerce_mini_cart' );