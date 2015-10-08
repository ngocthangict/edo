<?php
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Pages widget class
 *
 * @since 1.0
 */
class Widget_KT_Topsellers extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
                        'classname' => 'widget_kt_topsellers', 
                        'description' => esc_attr__( 'Box top sellers product on sidebar.', 'edo' ) );
		parent::__construct( 'widget_kt_topsellers', esc_attr__('Edo Top sellers', 'edo' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
        $title          = isset( $instance[ 'title' ] )   ? esc_attr($instance[ 'title' ])   : '';
        $posts_per_page = isset( $instance[ 'posts_per_page' ] )   ? $instance[ 'posts_per_page' ]   : '3';
        echo do_shortcode( '[top_seller taxonomy="" icon="" title="' . $title . '" per_page="'.$posts_per_page.'" autoplay="true" loop="true" ]' );
	}

	public function update( $new_instance, $old_instance ) {
        $instance                     = $new_instance;
        $instance[ 'title' ]          = isset( $new_instance[ 'title' ] ) ? $new_instance[ 'title' ] : '';
        $instance[ 'posts_per_page' ] = $new_instance[ 'posts_per_page' ]   ? $new_instance[ 'posts_per_page' ] : '3';
        
		return $instance;
	}

	public function form( $instance ) {
		//Defaults
        $title          = isset( $instance[ 'title' ] )      ? $instance[ 'title' ] : 'Top sellers';
        $posts_per_page = isset( $instance[ 'posts_per_page' ] )      ? $instance[ 'posts_per_page' ] : '3';
	?>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ; ?>"><?php esc_html_e( 'Title:', 'edo'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('title') ) ; ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ) ; ?>"><?php esc_html_e( 'Products per page:', 'edo'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_per_page' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('posts_per_page') ) ; ?>" type="text" value="<?php echo esc_attr($posts_per_page); ?>" />
        </p>
        
    <?php
	}

}

add_action( 'widgets_init', function(){
register_widget( 'Widget_KT_Topsellers' );

} );