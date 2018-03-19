<section class="article-share clearfix px2">
    <div class="center mx-auto">
        <span class="article-share__label h5 mb2"><?php _e( 'Dela med en vän', 'visithalland' ); ?></span>
        <h2 class="article-share__title mt1 mb0"><?php _e( 'Dela artikeln med en vän.', 'visithalland' ); ?></h2>
    </div>
    <div class="article-share__buttons center mt4">
        <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="btn article-share__button facebook">
            <svg class="article-share__icon">
                <use xlink:href="#facebook-icon"/>
            </svg>
            <span class="article-share__button-label"><?php _e( 'Dela på Facebook', 'visithalland' ); ?></span>
        </a>
        <a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo get_the_post_thumbnail_url( $post_id, 'vh_large' )?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" class="btn article-share__button pinterest">
            <svg class="article-share__icon">
                <use xlink:href="#pinterest-icon"/>
            </svg>
            <span class="article-share__button-label"><?php _e( 'Pin på pinterest', 'visithalland' ); ?></span>
        </a>
    </div>
</section>
