<?php
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Pages widget class
 *
 * @since 1.0
 */
class Widget_KT_Product_Special extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
                        'classname' => 'widget_kt_product_special', 
                        'description' => esc_attr__( 'Box special product on sidebar.', 'edo' ) );
		parent::__construct( 'widget_kt_product_special', esc_attr__('Edo Special Product', 'edo' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
        echo apply_filters( 'edo_wg_before_widget', $args['before_widget'] ) ;
        
        $title          = isset( $instance[ 'title' ] )   ? esc_attr($instance[ 'title' ])   : 'Specials';
        
        $orderby        = isset( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : 'date';
        $order          = isset( $instance[ 'order' ] )   ? $instance[ 'order' ]   : 'desc';
        $posts_per_page = isset( $instance[ 'posts_per_page' ] )   ? $instance[ 'posts_per_page' ]   : '3';
        $meta_query = WC()->query->get_meta_query();
        $params = array(
			'post_type'				=> 'product',
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' 		=> $posts_per_page,
			'meta_query' 			=> $meta_query,
            'suppress_filter'       => true,
            'orderby'               => $orderby,
            'order'	                => $order
		);
        if( $title ){
            echo apply_filters( 'edo_wg_after_title', $args[ 'before_title' ] ) ;
            echo esc_html( $title );
            echo apply_filters( 'edo_wg_after_title', $args[ 'after_title' ] ) ;
        }
        $product = new WP_Query( $params );
        ?>
        <!-- SPECIAL -->
        <div class="block-specials">
            <?php
            if ( $product->have_posts() ):
            ?>
                <?php while($product->have_posts()): 
                $product->the_post();
                ?>
                    <div class="product">
                        <div class="image">
                            <a href="<?php the_permalink();?>">
                            <?php the_post_thumbnail( 'shop_thumbnail' );?>
                            </a>
                        </div>
                        <div class="product-name">
                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                        </div>
                        <?php woocommerce_template_loop_price();?>
                    </div>
                <?php endwhile; ?>
            <?php
            endif;
            wp_reset_query();
            wp_reset_postdata();
            $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );            
            ?>
            <a href="<?php echo esc_url( $shop_page_url ) ; ?>" class="button-radius"><?php esc_html_e( 'All Products', 'edo' ) ?><span class="icon"></span></a>
        </div> 
        <!-- ./SPECIAL -->
        <?php
        echo apply_filters( 'edo_wg_after_widget', $args[ 'after_widget' ] ) ;
	}

	public function update( $new_instance, $old_instance ) {
        $instance                     = $new_instance;
        $instance[ 'title' ]          = isset( $new_instance[ 'title' ] ) ? $new_instance[ 'title' ] : '';
        
        $instance[ 'orderby' ]        = $new_instance[ 'orderby' ] ? $new_instance[ 'orderby' ] : 'date';
        $instance[ 'order' ]          = $new_instance[ 'order' ]   ? $new_instance[ 'order' ] : 'desc';
        $instance[ 'posts_per_page' ] = $new_instance[ 'posts_per_page' ]   ? $new_instance[ 'posts_per_page' ] : '3';
        
		return $instance;
	}

	public function form( $instance ) {
		//Defaults
        $title          = isset( $instance[ 'title' ] )      ? $instance[ 'title' ] : '';
        
        $orderby        = isset( $instance[ 'orderby' ] )    ? $instance[ 'orderby' ] : 'date';
        $order          = isset( $instance[ 'order' ] )      ? $instance[ 'order' ] : 'desc';
        $posts_per_page = isset( $instance[ 'posts_per_page' ] )      ? $instance[ 'posts_per_page' ] : '3';
	?>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ; ?>"><?php esc_html_e( 'Title:', 'edo'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('title') ) ; ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ) ; ?>"><?php esc_html_e( 'Order By:', 'edo'); ?></label> 
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('orderby') ) ; ?>">
                <option value="id" <?php selected( 'id', $orderby ) ?>><?php esc_html_e( 'ID', 'edo' ) ?></option>
            	<option class="author" value="author" <?php selected( 'author', $orderby ) ?>><?php esc_html_e( 'Author', 'edo' ) ?></option>
            	<option class="name" value="name" <?php selected( 'name', $orderby ) ?>><?php esc_html_e( 'Name', 'edo' ) ?></option>
            	<option class="date" value="date" <?php selected( 'date', $orderby ) ?>><?php esc_html_e( 'Date', 'edo' ) ?></option>
            	<option class="modified" value="modified" <?php selected( 'modified', $orderby ) ?>><?php esc_html_e( 'Modified', 'edo' ) ?></option>
            	<option class="rand" value="rand" <?php selected( 'rand', $orderby ) ?>><?php esc_html_e( 'Rand', 'edo' ) ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ) ; ?>"><?php esc_html_e( 'Order Way:', 'edo'); ?></label> 
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'order' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('order') ) ; ?>">
                <option value="desc" <?php selected( 'desc', $order ) ?>><?php esc_html_e( 'DESC', 'edo' ) ?></option>
            	<option value="asc" <?php selected( 'asc', $order ) ?>><?php esc_html_e( 'ASC', 'edo' ) ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ) ; ?>"><?php esc_html_e( 'Products per page:', 'edo'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('posts_per_page') ) ; ?>" type="text" value="<?php echo esc_attr($posts_per_page); ?>" />
        </p>
        
    <?php
	}

}
add_action( 'widgets_init', function(){
    register_widget( 'Widget_KT_Product_Special' );
} );