<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    $post_id = get_the_id();
    
?>

<div id="container">
    <article class="container <?php echo vh_get_taxonomyslug_by_string(vh_get_post_taxonomy()['slug']) ?>" role="main" id="main-content">
        <section class="editorial-header relative clearfix" role="heading" id="page-content">
            <div class="editorial-header__backdrop topographic-pattern"></div>
            <div class="editorial-header__inner col-11 md-col-10 lg-col-8 mx-auto">
                <div class="editorial-header__img-container topographic-pattern">
                    <picture>

                        <source media="(min-width: 40em)"
                            data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_large@2x' ) . " 2x" ?>" />

                        <source
                            data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_medium@2x' ) . " 2x" ?>" />

                        <img class="editorial-header__img"
                                data-src="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_large' ); ?>" 
                                alt="<?php echo get_field("cover_image")["alt"] ?>"  
                        />

                    </picture>
                </div>
                <div class="editorial-header__content center">
                    <div class="article-tag">
                        <div class="article-tag__icon-wrapper">
                            <div class="article-tag__icon"></div>
                        </div>
                        <span class="article-tag__type">
                            <?php echo vh_get_pretty_post_type_name($post->post_type) ?>
                        </span>
                    </div>
                    <h1 class="editorial-header__title h1 mb3 center mt2"><?php the_title(); ?></h1>
                    <p class="editorial-header__preamble center"><?php echo get_field("excerpt"); ?></p>
                    <address class="author-vertical mt4 mb4">
                        <div class="author-vertical__img-container">
                            <img 
                                data-src="<?php echo get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"]; ?>" 
                                alt="'Skrivet av: ' + <?php the_author_meta('display_name'); ?>" 
                                class="author-vertical__img"
                            />
                        </div>
                        <div class="author-vertical__bio">
                            <span class="block author-vertical__name"><?php the_author_meta('display_name'); ?></span>
                            <span class="block author-vertical__title"><?php echo get_field('role', 'user_'. $author_id); ?></span>
                        </div>
                    </address>
                </div>
            </div>
        </section>
        <div class="article-content clearfix">
            <div class="col-11 md-col-10 lg-col-8 mx-auto">
            	<article class="article-body">
            	   <?php the_content(); ?>
                </article>
                <?php
                    $mentions = get_field("mentioned");
                    if (isset($mentions) && $mentions !== '') : ?>
                    <div class="article-mentions mt2 clearfix">
                        <div class="article-mentions__header">
                            <h3><?php _e( 'Restips från artikeln', 'visithalland' ); ?></h3>
                        </div>
                        <?php foreach ($mentions as $key => $value): ?>
                            <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
                        		<article class="article-mention col col-12 sm-col-6 mt3">
                                        <div class="clearfix">
                                            <div class="col col-5 sm-col-4 ">
                                                <div class="article-mention__img-container relative">
                                                	<picture>
                                                        <source
                                                            data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail@2x' ) . " 2x" ?>" />
                                                        <img class="article-mention__img"
                                                            data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ); ?>" 
                                                            alt="<?php echo get_field("cover_image")["alt"] ?>"  
                                                        />
                                                    </picture>
                                                </div>
                                            </div>
                        						<div class="article-mention__content col col-7 sm-col-8">
                                                    <h4 class="article-mention__title">
                                                        <?php if (get_field("title", $value->ID) != '') : ?>
                                                    
                                                            <?php echo the_field("title", $value->ID) ?>

                                                        <?php else : ?>

                                                            <?php echo $value->post_title ?>

                                                        <?php endif ?>
                                                    </h4>
                                                    <div class="read-more">
                                                        <span class="read-more__text">
                                                            <?php _e( 'Läs mer', 'visithalland' ); ?>
                                                        </span>
                                                        <div class="read-more__button">
                                                            <svg class="icon read-more__icon">
                                                                <use xlink:href="#arrow-right-icon"/>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                </article>
                            </a>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            </div>
        </div>

        <?php //START - Article Share Section ?>
        <section class="article-share clearfix">
            <div class="center mx-auto">
                <span class="article-share__label h5 mb2"><?php _e( 'Dela med en vän', 'visithalland' ); ?></span>
                <h2 class="article-share__title mt1 mb0"><?php _e( 'Dela artikeln med en vän.', 'visithalland' ); ?></h2>
            </div>
            <div class="article-share__buttons center mt4">
                <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>"" tabindex="0" class="btn article-share__button facebook">
                    <svg class="article-share__icon">
                        <use xlink:href="#facebook-icon"/>
                    </svg>
                    <span class="article-share__button-label"><?php _e( 'Dela på Facebook', 'visithalland' ); ?></span>
                </a>
                <a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo get_field("cover_image")["sizes"]["vh_large"]?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" tabindex="0" class="btn article-share__button pinterest">   
                    <svg class="article-share__icon">
                        <use xlink:href="#pinterest-icon"/>
                    </svg>
                    <span class="article-share__button-label"><?php _e( 'Pin på pinterest', 'visithalland' ); ?></span>
                </a>
            </div>
        </section>
        <?php //END - Article Share Section ?>
    <?php endwhile; ?>
    </article>
</div>


<div class="next-post-link">
    <div id="nextPages" data-all='<?php echo json_encode(vh_get_next_previous_link()) ?>'></div>
</div>

<!-- Working on infinite scroll feedback -->
<div class="container">
    <div class="page-load-status">
        <p class="infinite-scroll-request">Hämtar nästa artikel</p>
        <p class="infinite-scroll-last">Slut på innehåll</p>
        <p class="infinite-scroll-error">Kunde inte hitta fler artiklar</p>
    </div>
</div>
 <!--- End Infinite Scroll -->


<?php get_footer(); ?>