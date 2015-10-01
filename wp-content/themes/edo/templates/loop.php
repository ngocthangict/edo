<li <?php post_class('post-item'); ?>>
    <article class="entry">
        <div class="entry-ci">
        	<?php if(has_post_thumbnail()):?>
        	<div class="entry-thumb image-hover2">
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail('thumbnails');?>
                </a>
            </div>
        	<?php endif;?>
            <h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <?php get_template_part( 'templates/post','meta' );?>
            <div class="entry-excerpt">
                <?php the_excerpt(); ?>
            </div>
            <div class="entry-more">
                <a class="button" href="<?php the_permalink();?>"><?php _e('Read more', 'edo' );?></a>
            </div>
        </div>
    </article>
</li>