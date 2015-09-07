<li <?php post_class('post-item'); ?>>
    <article class="entry">
        <div class="entry-ci">
            <h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <div class="entry-excerpt">
                <?php the_excerpt(); ?>
            </div>
            <div class="entry-more">
                <a class="button" href="<?php the_permalink();?>"><?php _e('Read more', 'edo' );?></a>
            </div>
        </div>
    </article>
</li>