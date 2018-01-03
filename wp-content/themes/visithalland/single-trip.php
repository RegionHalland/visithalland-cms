<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    
?>
	<article class="container <?php echo vh_get_post_taxonomy()['slug']; ?>" role="main" id="main-content">
	    <section class="spotlight-header">
	        <div class="spotlight-header__img-container">
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
	            <div class="spotlight-header__scrim absolute left-0 bottom-0 right-0"></div>
	            <div class="spotlight-header__content center">
	                <div class="clearfix">
	                    <div class="col-12 sm-col-10 md-col-8 lg-col-6 mx-auto">
	                        <div class="spotlight-header__icon mx-auto"></div>
	                        <h1 class="spotlight-header__title center light"><?php the_title(); ?></h1>
	                        <div class="spotlight-header__paragraph light mt2">
	                            <p><?php echo get_field("excerpt"); ?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <div class="spotlight-content">
	        <div class="clearfix spotlight-grid">
	            <div class="spotlight-grid-item col col-12">
	        	 	<?php

	                    $spotlights = get_field("stops");
	                    // Needs images //
	                    foreach ($spotlights as $index => $value): ?>
	                    	<?php if(($index + 1) % 3 === 0) : ?>
		            			<div class="spotlight-grid-item col col-12">
					                <div class="spotlight-large clearfix">
					                    <div class="spotlight-large__img-container topographic-pattern">
											<picture>
								                <source media="(min-width: 40em)"
								                    srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
								                <source
								                    srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
								                <img class="meet-a-local-header__img" 
								                        src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] ?>" 
								                        alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>"  
								                />
								            </picture>
					                    </div>
					                    <div class="spotlight-large__content col-12 lg-col-8 relative">
					                        <h2 class="spotlight-large__title mt2 p0 mb0"><?php echo $value->post_title ?></h2>
					                        <div class="spotlight-large__excerpt mt1">
					                            <?php the_field("body", $value->ID); ?>

					                        </div>
					                        <div class="spotlight-large__links">
					                            <a class="spotlight-large__btn btn btn--primary link-reset" href="<?php echo $value->guid ?>">
														Se <?php echo $value->post_title ?>
					                            </a>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        <?php else: ?> 
					        	<div class="spotlight-grid-item col col-12  sm-col-6">
					                <div class="spotlight-small">
					                    <div class="spotlight-small__img-container topographic-pattern">
											<picture>
								                <source media="(min-width: 40em)"
								                    srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
								                <source
								                    srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
								                <img class="meet-a-local-header__img" 
								                        src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] ?>" 
								                        alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>"  
								                />
								            </picture>
					                    </div>
					                    <div class="spotlight-small__content col-12 lg-col-12 relative">
					                        <h3 class="spotlight-small__title mb2 mt3 p0 mb0"><?php echo $value->post_title ?></h3>
					                        <div class="spotlight-small__excerpt mt1">
					                            <?php the_field("body", $value->ID); ?>
					                        </div>
					                        <div class="spotlight-small__links mt3">
					                            <a class="spotlight-small__btn btn btn--primary link-reset" href="<?php echo $value->guid ?>">
					                              Se <?php echo $value->post_title ?>
					                            </a>
					                        </div>
					                    </div>
					                </div>
					            </div>
				            <?php endif ?>
	                <?php endforeach ?>
	            </div>
	        </div>
	    </div>
	    <div class="featured-articles mxn2 mt6 col-12 md-col-10 lg-col-12 mx-auto">  
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