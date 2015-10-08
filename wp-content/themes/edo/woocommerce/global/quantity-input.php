<?php
/**
 * Product quantity inputs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="clear"></div>
<table class="variations-table quantity-table">
    <tbody>
    <tr>
        <td class="table-label"><?php esc_html_e('Qty', 'edo') ?></td>
        <td class="table-value">
            <div class="box-qty">
                <a href="#" class="quantity-minus">-</a>
                <input type="text" step="<?php echo esc_attr( $step ); ?>" <?php if ( is_numeric( $min_value ) ) : ?>min="<?php echo esc_attr( $min_value ); ?>"<?php endif; ?> <?php if ( is_numeric( $max_value ) ) : ?>max="<?php echo esc_attr( $max_value ); ?>"<?php endif; ?> name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php _ex( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text qty text" size="4" />
                <a href="#" class="quantity-plus">+</a>
            </div>
        </td>
    </tr>
</tbody>
</table>
