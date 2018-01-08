<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    
?>
    <article class="container <?php echo vh_get_post_taxonomy()['slug']; ?>" role="main" id="main-content">
    <section class="business-header relative clearfix" role="heading" id="page-content">
    <div class="business-header__backdrop topographic-pattern"></div>
    <div class="business-header__inner col-12 md-col-10 lg-col-10 mx-auto">
        <div class="business-header__img-container topographic-pattern">
                <picture>
                    <source media="(min-width: 40em)"
                        srcSet="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image")["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
                    <source
                        srcSet="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
                    <img class="happening-header__img" 
                            src="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] ?>" 
                            alt="<?php echo get_field("cover_image")["alt"] ?>"  
                    />
                </picture>
        </div>
        <div class="business-header__content center">
            <div class="article-tag">
                <div class="article-tag__icon-wrapper">
                    <div class="article-tag__icon"></div>
                </div>
                <span class="article-tag__type">
                    <?php echo vh_get_pretty_post_type_name($post->post_type) ?>
                </span>
            </div>
            <h1 class="business-header__title h1 mb3 center mt2"><?php the_title(); ?></h1>
            <div class="business-header__details">
                <?php the_field('body', $value->ID); ?>
            </div>
            <div class="details clearfix left-align">
                    <section class="details__section details__open-hours col col-12 sm-col-4 list-style-none p0"><span class="details__section-label block">Visit us</span>
                        <li class="details__open-hour">måndag: Stängt</li>
                        <li class="details__open-hour">tisdag: Stängt</li>
                        <li class="details__open-hour">onsdag: 18:00–00:00</li>
                        <li class="details__open-hour">torsdag: 18:00–00:00</li>
                        <li class="details__open-hour">fredag: 18:00–00:00</li>
                        <li class="details__open-hour">lördag: 18:00–00:00</li>
                        <li class="details__open-hour">söndag: Stängt</li>
                    </section>
                    <section class="details__section col col-12 sm-col-4"><span class="details__section-label block">Get in touch</span><a href="http://maps.google.com/?q=Prostens Pizza, Falkenberg, Sverige" class="details__phone block"><i class="details__icon material-icons mr2">business</i><!-- react-text: 826 -->Visa på karta<!-- /react-text --></a></section>
                    <section
                        class="details__section col col-12 sm-col-4"><span class="details__section-label block">Read more</span>
                        <a href="<?php get_field('external_link')?>" class="btn btn--primary inline-block">Besök webbplats</a></section>
                    </div>
                </div>
            </div>
        </section>      
        <div class="featured-articles mxn2 mt6 col-11 md-col-10 lg-col-10 mx-auto">  
            <div class="clearfix">  
                <?php
                    $featuredArticles = vh_get_posts_by_taxonomy_concept($post->ID);
                    foreach ($featuredArticles as $key => $value): ?>
                        <article class="article-medium px2 col col-12 md-col-4 <?php echo vh_get_post_taxonomy()["slug"] ?>">
                            <a href="<?php echo $value->guid ?>" class="link-reset">
                                <div class="article-medium__img-container topographic-pattern">
                                    <picture>
                                        <source media="(min-width: 40em)"
                                            srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
                                        <source
                                            srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
                                        <img class="concept-header__img" src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" />
                                    </picture>
                                </div>
                                <div class="article-medium__content">
                                    <div class="article-tag mt3 mb2">
                                        <div class="article-tag__icon-wrapper">
                                            <div class="article-tag__icon"></div>
                                        </div>
                                        <span class="article-tag__type">
                                            <?php echo vh_get_pretty_post_type_name($value->post_type); ?>
                                        </span>
                                    </div>
                                    
                                    <h3 class="mb1 mt1 pt0"><?php echo $value->post_title ?></h3>
                                    <p class="mt2"><?php echo get_field("excerpt", $value->ID) ?></p>
                                </div>
                            </a>
                        </article>
                <?php endforeach ?>
            </div>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>