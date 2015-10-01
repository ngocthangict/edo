<div class="entry-meta-data">
    <?php if( is_sticky( get_the_ID() ) ):?>
    <span class="featured-post"><?php _e( 'Sticky', 'edo');?></span>
<?php endif; ?>
    <?php
    printf( '<span class="author vcard"><i class="fa fa-user"></i> '.__('by:', 'edo' ).'  <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( __( 'View all posts by %s', 'edo' ), get_the_author() ) ),
        get_the_author()
    );
    ?>
    <span class="cat"><i class="fa fa-folder-o"></i> <?php the_category(', '); ?></span>
    <span class="comment-count"><i class="fa fa-comment-o"></i> <?php comments_number(
        __('0 comment', 'edo'),
        __('1 comments', 'edo'),
        __('% comments', 'edo')
    ); ?></span>
    <span class="date"><i class="fa fa-calendar"></i> <?php echo get_the_date('F j, Y');?></span>
</div>