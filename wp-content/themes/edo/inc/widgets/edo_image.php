<?php
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

/**
 * Pages widget class
 *
 * @since 1.0
 */
class Widget_Edo_Custom_Image extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
                        'classname' => 'widget_edo_custom_image', 
                        'description' => esc_attr__( 'You can add custom image.', 'edo' ) );
		parent::__construct( 'widget_edo_custom_image', esc_attr__('Edo Custom Image', 'edo' ), $widget_ops );
	}

	public function widget( $args, $instance ) {
	   echo apply_filters( 'edo_wg_before_widget', $args['before_widget'] ) ;
       //Defaults
        $wtitle = (isset( $instance[ 'wtitle' ] ) && $instance[ 'wtitle' ] ) ? $instance[ 'wtitle' ] : '';
       ?>
       <div class="list-image">
            <?php if( $wtitle ): ?>
                <?php echo apply_filters( 'edo_wg_before_title', $args[ 'before_title' ] ) ; ?>
                    <?php echo esc_attr( $wtitle ); ?>
                <?php echo apply_filters( 'edo_wg_after_title', $args[ 'after_title' ] ) ; ?>
            <?php endif; ?>
            <ul id="list-link images">
            <?php 
             if(isset($instance[ 'title' ]) && $instance[ 'title' ] && count($instance[ 'title' ]) > 0 ):
                for( $i = 0; $i < count($instance['title']); $i++ ):
                    $title  = isset( $instance[ 'title' ][$i])   && $instance[ 'title' ][$i]   ? $instance[ 'title' ][$i] : '';
                    $image  = isset( $instance[ 'image' ][$i])   && $instance[ 'image' ][$i]   ? $instance[ 'image' ][$i] : '';
                    $link   = isset( $instance[ 'link' ][$i])    && $instance[ 'link' ][$i]    ? $instance[ 'link' ][$i] : '#';
                    $target = isset( $instance[ 'target' ][$i])  && $instance[ 'target' ][$i]  ? $instance[ 'target' ][$i] : '_blank';
                    $preview = false;
                    $img_preview = "";
                    if($image){
                        $img_preview = wp_get_attachment_url($image);
                        $preview = true;
                    }
                    if($preview):
                    ?>
                    <li class="banner-hover">
                        <a target="<?php echo esc_attr( $target ) ?>" href="<?php echo esc_url($link) ?>">
                            <img src="<?php echo esc_url( $img_preview ); ?>" alt="<?php echo esc_attr($title) ?>" />
                            <span class="title"><?php echo esc_attr($title) ?></span>
                        </a>
                    </li>
                    <?php endif; ?>
                <?php endfor; ?>
            <?php endif; ?>
            </ul>
        </div>
       <?php
       echo apply_filters( 'edo_wg_after_widget', $args[ 'after_widget' ] ) ;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $new_instance;
		$instance[ 'wtitle' ] = $new_instance[ 'wtitle' ] ? $new_instance[ 'wtitle' ] : '';
        
        if( isset( $new_instance[ 'image' ] ) && $new_instance[ 'image' ] && count( $new_instance[ 'image' ] ) > 0 ){
            $tmp = array();
            for( $i = 0; $i < count( $new_instance['image'] ); $i++ ){
                
                $title  = isset($new_instance[ 'title' ][$i]) ? $new_instance[ 'title' ][$i] : '';
                $image  = isset($new_instance[ 'image' ][$i]) ? $new_instance[ 'image' ][$i] : '';
                $link   = isset($new_instance[ 'link' ][$i]) ? $new_instance[ 'link' ][$i] : '#';
                $target = isset($new_instance[ 'target' ][$i]) ? $new_instance[ 'target' ][$i] : '_blank';
                
                if($image){
                    $tmp[ 'title' ][]  = esc_html( $title ) ?  esc_html( $title ) : '';
                    $tmp[ 'image' ][]  = intval( $image ) ? intval( $image ) : '';
                    $tmp[ 'link' ][]   = esc_url( $link ) ? esc_url( $link ) : '#';
                    $tmp[ 'target '][] = esc_attr( $target  ) ? esc_attr( $target  ) : '_blank';
                }
            }
            $instance[ 'title' ] = $tmp[ 'title' ];
            $instance[ 'image' ] = $tmp[ 'image' ];
            $instance[ 'link' ] = $tmp[ 'link' ];
            $instance[ 'target' ] = $tmp[ 'target' ];
        }
		return $instance;
	}

	public function form( $instance ) {
		//Defaults
        $wtitle = (isset( $instance[ 'wtitle' ] ) && $instance[ 'wtitle' ] ) ? $instance[ 'wtitle' ] : '';
	?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'wtitle' ) ) ; ?>"><?php esc_html_e( 'Title:', 'edo'); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'wtitle' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('wtitle') ) ; ?>" type="text" value="<?php echo esc_attr($wtitle); ?>" />
        </p>
        <div class="content multi-item">
            <?php
                if(isset($instance[ 'image' ]) && $instance[ 'image' ] && count($instance[ 'image' ]) > 0 ){
                    for( $i = 0; $i < count( $instance['image'] ); $i++ ){
                        
                        $title  = isset( $instance[ 'title' ][$i])   && $instance[ 'title' ][$i]   ? $instance[ 'title' ][$i] : '';
                        $image  = isset( $instance[ 'image' ][$i] )   && $instance[ 'image' ][$i]   ? $instance[ 'image' ][$i] : '';
                        $link   = isset( $instance[ 'link' ][$i])    && $instance[ 'link' ][$i]    ? $instance[ 'link' ][$i] : '#';
                        $target = isset( $instance[ 'target' ][$i]) && $instance[ 'target' ][$i]  ? $instance[ 'target' ][$i] : '_blank';
                        
                        $img_preview = "";
                        if( $image ){
                            $img_preview = wp_get_attachment_url($image);
                            $preview = true;
                        }
                        if($preview){?>
                        <div class="item widget-content">
                            <span class="remove"><?php _e( 'X', 'edo' ) ?></span>
                            <p>
                                <label><?php esc_html_e( 'Title:', 'edo'); ?></label> 
                                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title') ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('title') ) ; ?>[]" type="text" value="<?php echo esc_attr($title); ?>" />
                            </p>
                            <p style="text-align: center;">
                                <input type="button" style="width: 100%; padding: 10px; height: auto;" class="button kt_image_upload" value="<?php esc_attr_e('Select your image', 'edo') ?>" />
                                <input class="widefat kt_image_attachment" id="<?php echo esc_attr( $this->get_field_id( 'image') ) ; ?>" name="<?php echo esc_attr( $this->get_field_name('image') ) ; ?>[]" type="hidden" value="<?php echo esc_attr( $image ); ?>" />
                            </p>
                            <p class="kt_image_preview" style="<?php if( $preview ){ echo "display: block;";} ?>">
                                <img src="<?php echo esc_url( $img_preview ); ?>" alt="" class="kt_image_preview_img" />
                            </p>
                            <p>
                            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ) ; ?>"><?php esc_html_e( 'Link:', 'edo'); ?></label> 
                                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link') ) ; ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ) ; ?>[]" type="text" value="<?php echo esc_attr( $link ); ?>" />
                            </p>
                            <p>
                    			<label><?php esc_html_e( 'Target:', 'edo'); ?></label>
                    			<select name="<?php echo esc_attr( $this->get_field_name('target') ) ; ?>[]" id="<?php echo esc_attr( $this->get_field_id('target') ) ; ?>" class="widefat">
                    				<option value="_blank"<?php selected( $target, '_blank' ); ?>><?php esc_html_e('Open New Window', 'edo'); ?></option>
                    				<option value="_self"<?php selected( $target, '_self' ); ?>><?php esc_html_e('Stay in Window', 'edo'); ?></option>
                    			</select>
                    		</p>
                        </div>
                    <?php }}
                }else{?>
                    <div class="item widget-content">
                        <span class="remove"><?php _e( 'X', 'edo' ) ?></span>
                        <p>
                            <label><?php esc_html_e( 'Title:', 'edo'); ?></label> 
                            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ) ; ?>[]" type="text" />
                        </p>
                        <p style="text-align: center;">
                            <input type="button" style="width: 100%; padding: 10px; height: auto;" class="button kt_image_upload" value="<?php esc_attr_e( 'Select your image', 'edo' ) ?>" />
                            <input class="widefat kt_image_attachment" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ) ; ?>[]" type="hidden"  />
                        </p>
                        <p class="kt_image_preview">
                            <img src="" alt="" class="kt_image_preview_img" />
                        </p>
                        <p>
                        <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ) ; ?>"><?php esc_html_e( 'Link:', 'edo'); ?></label> 
                            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ) ; ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ) ; ?>[]" type="text" />
                        </p>
                        <p>
                			<label><?php esc_html_e( 'Target:', 'edo'); ?></label>
                			<select name="<?php echo esc_attr( $this->get_field_name( 'target' ) ) ; ?>[]" id="<?php echo esc_attr( $this->get_field_id( 'target' ) ) ; ?>" class="widefat">
                				<option value="_blank"><?php esc_html_e( 'Open New Window', 'edo' ); ?></option>
                				<option value="_self"><?php esc_html_e( 'Stay in Window', 'edo' ); ?></option>
                			</select>
                		</p>
                    </div>
            <?php } ?>
            
            <div style="text-align: right;" class="btn-template">
                <input type="button" class="button btn-plus" value="+" />
                <div class="template" style="display: none;">
                    <div class="item widget-content">
                        <span class="remove"><?php _e( 'X', 'edo' ) ?></span>
                        <p>
                            <label><?php esc_html_e('Title:', 'edo'); ?></label> 
                            <input class="widefat widget-name" id="<?php echo esc_attr( $this->get_field_id('title') ) ; ?>" tpl-name="<?php echo esc_attr( $this->get_field_name('title') ) ; ?>[]" type="text" />
                        </p>
                        
                        <p style="text-align: center;">
                            <input type="button" style="width: 100%; padding: 10px; height: auto;" class="button kt_image_upload" value="<?php esc_attr_e('Select your image', 'edo') ?>" />
                            <input class="widefat widget-name kt_image_attachment" id="<?php echo esc_attr( $this->get_field_id('image') ) ; ?>" tpl-name="<?php echo esc_attr( $this->get_field_name('image') ) ; ?>[]" type="hidden" />
                        </p>
                        
                        <p class="kt_image_preview" style="display: none;">
                            <img src="" alt="" class="kt_image_preview_img" />
                        </p>
                        
                        <p>
                            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ) ; ?>"><?php esc_html_e( 'Link:', 'edo' ); ?></label> 
                            <input class="widefat widget-name" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ) ; ?>" tpl-name="<?php echo esc_attr( $this->get_field_name('link') ); ?>[]" type="text" />
                        </p>
                        
                        <p>
                			<label><?php esc_html_e( 'Target:', 'edo'); ?></label>
                			<select tpl-name="<?php echo esc_attr( $this->get_field_name( 'target' ) ) ; ?>[]" id="<?php echo esc_attr( $this->get_field_id('target') ) ; ?>" class="widefat widget-name">
                				<option value="_blank"><?php esc_html_e( 'Open New Window', 'edo' ); ?></option>
                				<option value="_self"><?php esc_html_e( 'Stay in Window', 'edo' ); ?></option>
                			</select>
                		</p>
                    </div>
                </div>
            </div>
            <p></p>
        </div>
    <?php
	}

}
add_action( 'widgets_init', function(){
    register_widget( 'Widget_Edo_Custom_Image' );
} );