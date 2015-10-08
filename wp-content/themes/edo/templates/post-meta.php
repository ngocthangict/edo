<div class="entry-meta-data">
    <?php if( is_sticky( get_the_ID() ) ):?>
    <span class="featured-post"><?php esc_html_e( 'Sticky', 'edo');?></span>
<?php endif; ?>
    <?php
    printf( '<span class="author vcard"><i class="fa fa-user"></i> '.esc_attr__('by:', 'edo' ).'  <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        esc_attr( sprintf( esc_attr__( 'View all posts by %s', 'edo' ), get_the_author() ) ),
        get_the_author()
    );
    ?>
    <span class="cat"><i class="fa fa-folder-o"></i> <?php the_category(', '); ?></span>
    <span class="comment-count"><i class="fa fa-comment-o"></i> <?php comments_number(
        esc_attr__('0 comment', 'edo'),
        esc_attr__('1 comments', 'edo'),
        esc_attr__('% comments', 'edo')
    ); ?></span>
    <span class="date"><i class="fa fa-calendar"></i> <?php echo get_the_date('F j, Y');?></span>
</div>