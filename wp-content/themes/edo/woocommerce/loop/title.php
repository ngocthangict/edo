<?php
/**
 * Product loop title
 *
 * @author  AngelsIT
 * @package Edo/wooCommerce/
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>