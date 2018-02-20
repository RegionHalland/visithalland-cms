<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); 
        $author_id = get_the_author_meta('ID');
        $post_id = get_the_id();
        $currentTerm = count(get_the_terms($post, "taxonomy_concept")) ? get_the_terms($post, "taxonomy_concept")[0] : ""
        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    ?>

    <article class="container <?php echo get_term_for_default_lang($currentTerm, "taxonomy_concept")->slug ?>" role="main" id="main-content">

        <?php /* START - place Header */ ?>
        <section class="place-header relative clearfix" role="heading" id="page-content">
            <div class="place-header__backdrop topographic-pattern"></div>
            <div class="place-header__inner col-11 md-col-10 lg-col-8 mx-auto">
                <div class="place-header__img-container topographic-pattern">
                    <picture>

                        <source media="(min-width: 40em)"
                            data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_large@2x' ) . " 2x" ?>" />

                        <source
                            data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_medium@2x' ) . " 2x" ?>" />

                        <img class="happening-header__img lazyload"
                                data-src="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_large' ); ?>" 
                                alt="<?php echo $alt ?>"  
                        />
                        
                    </picture>
                </div>
                <div class="clearfix">
                    <div class="place-header__content col col-12 md-col-7">
                        <div class="article-tag">
                            <div class="article-tag__icon-wrapper">
                                <div class="article-tag__icon"></div>
                            </div>
                            <span class="article-tag__type">
                                <?php echo vh_get_pretty_post_type_name($post->post_type) ?>
                            </span>
                        </div>
                        <h1 class="place-header__title h1 mb3 mt2"><?php the_title(); ?></h1>
                        <div class="place-header__details">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="place__details col col-12 md-col-5">
                    <?php if(get_field("google_conditional")) :?>
                        <?php /* START - Google place Details */ ?>
                                <section class="details clearfix ">
                                    <div id="map"></div>
                                    <section id="opening-hours" class="details__section details__open-hours col col-12 list-style-none p0">
                                        <span class="details__section-label block"><?php _e( 'Öppettider', 'visithalland' ); ?></span>
                                    </section>
                                    <section class="details__section col col-12">
                                        <span class="details__section-label block"><?php _e( 'Hitta hit', 'visithalland' ); ?></span>
                                        <a id="details-show-on-map" href="" class="details__phone block">
                                            <svg class="icon details__icon">
                                                <use xlink:href="#pin-icon"/>
                                            </svg>
                                            <?php _e( 'Visa på karta', 'visithalland' ); ?>
                                        </a>
                                    </section>
                                        <section
                                            class="details__section col col-12">
                                            <span class="details__section-label block"><?php _e( 'Läs mer', 'visithalland' ); ?></span>
                                            <a id="details-visit-website" href="" class="btn btn--primary inline-block"><?php _e( 'Gå till webbplats', 'visithalland' ); ?></a>
                                        </section>
                                </section>
                        <?php /* End - Google place Details */ ?>
                    <?php else :?>
                        <section class="details clearfix ">
                            <section class="details__section col col-12">
                                <span class="details__section-label block"><?php _e( 'Visa på karta', 'visithalland' ); ?></span>
                                <a href="http://www.google.com/maps/place/<?php echo get_field("location")['lat']; ?>,<?php echo get_field("location")['lng']; ?>" class="details__phone block">
                                    <svg class="icon details__icon">
                                        <use xlink:href="#pin-icon"/>
                                    </svg>
                                    <?php _e( 'Visa på karta', 'visithalland' ); ?>
                                </a>
                            </section>
                            <section class="details__section col col-12">
                                <span class="details__section-label block"><?php _e( 'Läs mer', 'visithalland' ); ?></span>
                                <a href="<?php echo get_field("external_links")[0]["link"]; ?>" class="btn btn--primary inline-block"><?php _e( 'Gå till webbplats', 'visithalland' ); ?></a>
                            </section>
                        </section>
                    <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
        <?php /* End - place Header */ ?>

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
        

        <?php /* Start - Featured Articles */ ?>     
        <div class="recommended-articles col-11 md-col-10 lg-col-10 mx-auto">  
            <div class="clearfix mxn2"> 
                <h2 class="recommended-articles__title mx-auto center">Vidare läsning</h2> 
                <?php
                    $featuredArticles = vh_get_posts_by_taxonomy_concept($post->ID);
                    foreach ($featuredArticles as $key => $value): ?>
                        <article class="article-medium mt3 px2 col col-12 sm-col-4 md-col-4 <?php echo get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug ?>">
                            <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
                                <div class="article-medium__img-container topographic-pattern">
                                    <div class="article-tag absolute top-0 left-0 mt2 ml2 z3">
                                        <div class="article-tag__icon-wrapper">
                                            <div class="article-tag__icon"></div>
                                        </div>
                                    </div>
                                    <picture>
                                        <source
                                            data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" ?>" />

                                        <img class="article-medium__img lazyload"
                                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ); ?>" 
                                                alt="<?php echo get_field("cover_image")["alt"] ?>"  
                                        />
                                        
                                    </picture>  
                                </div>
                                <div class="article-medium__content">
                                    <h3 class="article-medium__title mb1 mt3 pt0"><?php echo $value->post_title ?></h3>
                                    <p class="article-medium__excerpt mt2"><?php echo get_field("excerpt", $value->ID) ?></p>
                                    <div class="read-more">
                                        <span class="read-more__text"><?php _e( 'Läs mer', 'visithalland' ); ?></span>
                                        <div class="read-more__button">
                                            <svg class="icon read-more__icon">
                                                <use xlink:href="#arrow-right-icon"/>
                                            </svg>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </article>
                <?php endforeach ?>
            </div>
        </div>
        <?php /* Start - Featured Articles */ ?>  

        
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>

<?php

?>