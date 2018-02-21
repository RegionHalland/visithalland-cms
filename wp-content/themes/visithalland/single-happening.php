<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    $post_id = get_the_id();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    
?>
<div id="infinite-container">
	<article class="container <?php echo get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug ?>" role="main" id="main-content">
	    <section class="happening-header relative clearfix">
                <div class="happening-header__backdrop topographic-pattern"></div>
                <div class="happening-header__inner col-11 md-col-10 lg-col-8 mx-auto relative">
                    <div class="happening-header__img-container topographic-pattern">
                        <div class="happening-header__date">
	                         <div class="date-badge">
								    <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date"))); ?></span>
								    <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date"))); ?></span>
							  </div>
                        </div>
                        <picture>
                            <source media="(min-width: 40em)" data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_large@2x' ) . " 2x" ?>" />

		                    <source data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_medium@2x' ) . " 2x" ?>" />

                            <img class="happening-header__img lazyload"
                                    data-src="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_large' ); ?>" 
                                    alt="<?php echo $alt ?>"  
                            />
		                </picture>
                        <?php if($thumbnail_image[0]->post_content) : ?>
                        <figcaption class="image-credit--large absolute top-0 right-0 mr2 mt2 z4">
                            <svg class="icon image-credit--large__icon">
                                <use xlink:href="#camera-icon"/>
                            </svg>
                            <span class="image-credit--large__author"><?php echo $thumbnail_image[0]->post_content; ?></span>
                        </figcaption>
                        <?php endif ?>
                    </div>
                    <div class="clearfix">
                        <div class="happening-header__content col col-11 sm-col-6 ">
                            <div class="article-tag">
			                    <div class="article-tag__icon-wrapper">
			                        <div class="article-tag__icon"></div>
			                    </div>
			                    <span class="article-tag__type">
			                        <?php echo vh_get_pretty_post_type_name($post->post_type) ?>
			                    </span>
			                </div>
                            <h1 class="happening-header__title h1 mb3  mt2"><?php the_title(); ?></h1>
                            <p class="happening-header__preamble">
                                <?php the_content(); ?>
                            </p>
                            <address class="author-horizontal mt4 mb4">
                                <div class="author-horizontal__img-container">
                                    <img 
                                        data-src="<?php echo get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"]; ?>" 
                                        alt="'Skrivet av: ' + <?php the_author_meta('display_name'); ?>" 
                                        class="author-horizontal__img lazyload"
                                    />
                                </div>
                                <div class="author-horizontal__bio">
                                    <span class="block author-horizontal__name"><?php the_author_meta('display_name'); ?></span>
                                    <span class="block author-horizontal__title"><?php echo get_field('role', 'user_'. $author_id); ?></span>
                                </div>
                            </address>
                        </div>
                        <aside class="happening-info relative  z3 col col-11 sm-col-6" role="complementary">
                            <div class="happening-info__inner topographic-pattern">
                                <section class="happening-info__section">
                                    <h3 class="happening-info__section-label"><?php _e( 'Datum', 'visithalland' ); ?></h3>
                                    <span class="happening-info__section-info light">
                                    	<span><?php echo $dateobj = date("j", strtotime(get_field("start_date"))); ?></span>
								    	<span><?php echo $dateobj = date("M", strtotime(get_field("start_date"))); ?></span>
								    </span>
                                </section>
                                <section class="happening-info__section">
                                    <h3 class="happening-info__section-label"><?php _e( 'Gå till webbplats', 'visithalland' ); ?></h3>
                                    <a href="<?php echo get_field("external_links")[0]["link"]; ?>" class="btn btn--primary inline-block"><?php _e( 'Mer information', 'visithalland' ); ?></a>
                                </section>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>

            <?php //START - Article Share Section ?>
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
            <?php //END - Article Share Section ?>
    	</article>
    <?php endwhile; ?>

</div>

<div class="next-post-link">
    <div id="nextPages" data-all='<?php echo json_encode(vh_get_next_previous_link()) ?>'></div>
</div>

<!-- Working on infinite scroll feedback -->
<div class="container">
    <!-- <div class="infinite-scroll">
        
    </div> -->
    <div class="page-load-status">
        <p class="infinite-scroll-request"><?php _e( 'Hämtar nästa artikel', 'visithalland' ); ?></p>
        <p class="infinite-scroll-last"><?php _e( 'Slut på innehåll', 'visithalland' ); ?></p>
        <p class="infinite-scroll-error"><?php _e( 'Kunde inte hitta fler artiklar', 'visithalland' ); ?></p>
    </div>
</div>
 <!--- End Infinite Scroll -->



<?php get_footer(); ?>