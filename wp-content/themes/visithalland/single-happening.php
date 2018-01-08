<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    
?>
	<article class="container <?php echo vh_get_post_taxonomy()['slug']; ?>" role="main" id="main-content">
	    <section class="happening-header relative clearfix">
                <div class="happening-header__backdrop topographic-pattern"></div>
                <div class="happening-header__inner col-12 md-col-10 lg-col-8 mx-auto relative">
                    <div class="happening-header__img-container topographic-pattern">
                        <div class="happening-header__date">
	                         <div class="date-badge">
								    <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date"))); ?></span>
								    <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date"))); ?></span>
							  </div>
                        </div>
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
                    <div class="clearfix">
                        <div class="happening-header__content col col-12 sm-col-6 ">
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
                                <?php the_field('body'); ?>
                            </p>
                        </div>
                        <aside class="happening-info relative  z3 col col-12 sm-col-6" role="complementary">
                            <div class="happening-info__inner topographic-pattern">
                                <section class="happening-info__section">
                                    <h3 class="happening-info__section-label">Datum</h3>
                                    <span class="happening-info__section-info light">
                                    	<span><?php echo $dateobj = date("j", strtotime(get_field("start_date"))); ?></span>
								    	<span><?php echo $dateobj = date("M", strtotime(get_field("start_date"))); ?></span>
								    </span>
                                </section>
                                <section class="happening-info__section">
                                    <h3 class="happening-info__section-label">Good to know</h3>
                                    <span class="happening-info__section-info"><?php the_field('good_to_know'); ?></span>
                                </section>
                                <section class="happening-info__section">
                                    <h3 class="happening-info__section-label">Visit us</h3>
                                    <a href="<?php the_field('external_links'[0]); ?>" class="btn btn--primary inline-block">Mer information</a>
                                </section>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
            <div class="featured-articles mt6 col-11 md-col-10 lg-col-10 mx-auto">  
                <div class="clearfix mxn2">  
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