<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); 
        $author_id = get_the_author_meta('ID');
    ?>

    <article class="container <?php echo vh_get_taxonomyslug_by_string(vh_get_post_taxonomy()['slug']) ?>" role="main" id="main-content">

        <?php /* START - place Header */ ?>
        <section class="place-header relative clearfix" role="heading" id="page-content">
            <div class="place-header__backdrop topographic-pattern"></div>
            <div class="place-header__inner col-11 md-col-10 lg-col-8 mx-auto">
                <div class="place-header__img-container topographic-pattern">
                        <picture>
                            <source media="(min-width: 40em)"
                                data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
                            <source
                                data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_medium"] . " 1x," . get_field("cover_image")["sizes"]["vh_medium@2x"] . " 2x" ?>" />
                            <img class="happening-header__img" 
                                    data-src="<?php echo get_field("cover_image")["sizes"]["vh_large"] ?>" 
                                    alt="<?php echo get_field("cover_image")["alt"] ?>"  
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
                            <?php the_field('body', $post->ID); ?>
                        </div>
                    </div>
                    <div class="place__details col col-12 md-col-5">
                    <?php /* START - Google place Details */ ?>
                            <section class="details clearfix ">
                                <div id="map"></div>
                                <section id="opening-hours" class="details__section details__open-hours col col-12 list-style-none p0">
                                    <span class="details__section-label block"><?php _e( 'Öppettider', 'visithalland' ); ?></span>
                                </section>
                                <section class="details__section col col-12">
                                    <span class="details__section-label block"><?php _e( 'Kontakt', 'visithalland' ); ?></span>
                                    <a id="details-show-on-map" href="" class="details__phone block">
                                        <i class="details__icon material-icons mr2">place</i>
                                        <?php _e( 'Visa på karta', 'visithalland' ); ?>
                                    </a>
                                </section>
                                <section
                                    class="details__section col col-12"><span class="details__section-label block"><?php _e( 'Läs mer', 'visithalland' ); ?></span><a id="details-visit-website" href="#" class="btn btn--primary inline-block"><?php _e( 'Gå till webbplats', 'visithalland' ); ?></a></section>
                            </section>
                        <?php /* End - Google place Details */ ?>
                    </div>
                </div>
            </div>
        </section>
        <?php /* End - place Header */ ?>

        <?php //START - Article Share Section ?>
        <section class="article-share clearfix">
            <div class="center mx-auto">
                <span class="article-share__label h5 mb2"><?php _e( 'Dela med en vän', 'visithalland' ); ?></span>
                <h2 class="article-share__title mt1 mb0"><?php _e( 'Dela artikeln med en vän.', 'visithalland' ); ?></h2>
            </div>
            <div class="article-share__buttons center mt4">
                <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>"" tabindex="0" class="btn article-share__button facebook">
                    <div style="width: 32px; height: 32px;">
                        <svg viewBox="0 0 64 64" fill="white" width="32" height="32" class="social-icon social-icon--facebook "><g><rect width="64" height="64" fill="#3b5998" style="fill: none;"></rect></g><g><path d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z"></path></g></svg>
                    </div>
                        <span class="article-share__button-label"><?php _e( 'Dela på Facebook', 'visithalland' ); ?></span>
                </a>
                <a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo get_field("cover_image")["sizes"]["vh_large"]?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" tabindex="0" class="btn article-share__button pinterest">   
                    <div style="width: 32px; height: 32px;">
                        <svg viewBox="0 0 64 64" fill="white" width="32" height="32" class="social-icon social-icon--pinterest "><g><rect width="64" height="64" fill="#cb2128" style="fill: none;"></rect></g><g><path d="M32,16c-8.8,0-16,7.2-16,16c0,6.6,3.9,12.2,9.6,14.7c0-1.1,0-2.5,0.3-3.7 c0.3-1.3,2.1-8.7,2.1-8.7s-0.5-1-0.5-2.5c0-2.4,1.4-4.1,3.1-4.1c1.5,0,2.2,1.1,2.2,2.4c0,1.5-0.9,3.7-1.4,5.7 c-0.4,1.7,0.9,3.1,2.5,3.1c3,0,5.1-3.9,5.1-8.5c0-3.5-2.4-6.1-6.7-6.1c-4.9,0-7.9,3.6-7.9,7.7c0,1.4,0.4,2.4,1.1,3.1 c0.3,0.3,0.3,0.5,0.2,0.9c-0.1,0.3-0.3,1-0.3,1.3c-0.1,0.4-0.4,0.6-0.8,0.4c-2.2-0.9-3.3-3.4-3.3-6.1c0-4.5,3.8-10,11.4-10 c6.1,0,10.1,4.4,10.1,9.2c0,6.3-3.5,11-8.6,11c-1.7,0-3.4-0.9-3.9-2c0,0-0.9,3.7-1.1,4.4c-0.3,1.2-1,2.5-1.6,3.4 c1.4,0.4,3,0.7,4.5,0.7c8.8,0,16-7.2,16-16C48,23.2,40.8,16,32,16z"></path></g></svg>
                    </div>
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
                        <article class="article-medium mt3 px2 col col-12 sm-col-4 md-col-4 <?php echo vh_get_taxonomyslug_by_string(vh_get_post_taxonomy()['slug']) ?>">
                            <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
                                <div class="article-medium__img-container topographic-pattern">
                                    <div class="article-tag absolute top-0 left-0 mt2 ml2 z3">
                                        <div class="article-tag__icon-wrapper">
                                            <div class="article-tag__icon"></div>
                                        </div>
                                    </div>
                                    <picture>
                                        <source media="(min-width: 40em)"
                                            data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
                                        <source
                                            data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
                                        <img class="article-medium__img" data-src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" />
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