<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    
?>
<article class="container <?php echo vh_get_post_taxonomy()['slug']; ?>" role="main" id="main-content">
    <section class={"editorial-header relative clearfix " + this.props.concept_slug} role="heading" id="page-content">
        <div class="editorial-header__backdrop topographic-pattern"></div>
        <div class="editorial-header__inner col-12 md-col-10 lg-col-10 mx-auto">
            <div class="editorial-header__img-container topographic-pattern">
                <picture>
                    <source media="(min-width: 40em)"
                        srcSet="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image")["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
                    <source
                        srcSet="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
                    <img class="editorial-header__img" 
                            src="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] ?>" 
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
                <address class="author-vertical center block mt4 mb4">
                    <div class="author-vertical__img-container mx-auto">
                        <img 
                            src="<?php echo get_avatar_url($author_id); ?>" 
                            alt="'Skrivet av: ' + <?php the_author_meta('display_name'); ?>" 
                            class="author-vertical__img"
                        />
                    </div>
                    <span class="block author-vertical__name"><?php the_author_meta('display_name'); ?></span>
                    <span class="block author-vertical__title"><?php the_author_meta('description'); ?></span>
                </address>
            </div>
        </div>
    </section>
    <div class="article-content clearfix">
        <div class="col-12 md-col-10 lg-col-8 mx-auto">
        	<article class="article-body">
        			<?php the_field("body") ?>
            </article>
            <div class="article-mentions mt2 clearfix">
    	        <div class="article-mentions__header">
    	            <h3>Restips från artikeln</h3>
    	        </div>
                    <?php
                        $mentions = get_field("mentioned");
                        // Needs images //
                        foreach ($mentions as $key => $value): ?>
                            <a href="<?php echo $value->guid ?>" class="link-reset">
                    			<article class="article-mention col col-12 sm-col-6 mt3">
                                        <div class="clearfix">
                                            <div class="col col-5 sm-col-4 ">
                                                <div class="article-mention__img-container relative">
                                                	<img 
                                                        class="article-mention__img" 
                                                        src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_thumbnail"] ?>" 
                                                        alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" 
                                                    />
                                                </div>
                                            </div>
                    							<div class="article-mention__content col col-7 sm-col-8">
                    	                            <h5 class="article-mention__label"><?php echo $value->post_title ?></h5>
                    	                            <h4 class="article-mention__title"><?php echo $value->post_title ?></h4>
                    	                            <div class="article-link inline-block mt2">
                    	                                <span class="article-link__text">Läs mer</span>
                    	                                <span class="article-link__icon-wrapper">
                    	                                    <i class="material-icons article-link__icon">arrow_forward</i>
                    	                                </span>
                    	                            </div>
                    	                        </div>
                                        </div>
                                </article>
                            </a>
                    <?php endforeach ?>
            </div>
        </div>
    </div>
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

<?php endwhile; ?>
</article>

<?php get_footer(); ?>