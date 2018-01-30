<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    
?>
<div id="container">
	<article class="container <?php echo vh_get_taxonomyslug_by_string(vh_get_post_taxonomy()['slug']) ?>" role="main" id="main-content">
	    <section class="spotlight-header">
	        <div class="spotlight-header__img-container">
	            <picture>
	                <source media="(min-width: 40em)"
	                    data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image")["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
	                <source
	                    data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image")["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
	                <img class="editorial-header__img" 
	                        data-src="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] ?>" 
	                        alt="<?php echo get_field("cover_image")["alt"] ?>"  
	                />
	            </picture>
	            <div class="spotlight-header__scrim absolute z1 left-0 bottom-0 right-0"></div>
	            <div class="spotlight-header__content z2 relative center">
	                <div class="clearfix">
	                    <div class="col-12 sm-col-10 md-col-8 lg-col-6 mx-auto">
	                        <div class="spotlight-header__icon mx-auto"></div>
	                        <h1 class="spotlight-header__title center light"><?php the_title(); ?></h1>
	                        <div class="spotlight-header__paragraph light mt2">
	                            <p><?php the_excerpt(); ?></p>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <div class="spotlight-content col-11 md-col-10 lg-col-10 mx-auto">
	        <div class="clearfix spotlight-grid">
	        	 	<?php
	                    $spotlights = get_field("stops");
	                    foreach ($spotlights as $index => $value): ?>
	                    	<?php if(($index + 1) % 3 === 0) : ?>
		            			<div class="spotlight-grid-item col col-12">
					                <div class="spotlight-large clearfix">
					                    <div class="spotlight-large__img-container topographic-pattern">
											<picture>
								                <source media="(min-width: 40em)"
								                    data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
								                <source
								                    data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
								                <img class="meet-a-local-header__img" 
								                        data-src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] ?>" 
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
					                            <a class="spotlight-large__btn btn btn--primary link-reset" href="<?php echo get_permalink($value->ID) ?>">
														<?php _e( 'Se', 'visithalland' ); ?> <?php echo $value->post_title ?>
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
								                    data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
								                <source
								                    data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
								                <img class="meet-a-local-header__img" 
								                        data-src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] ?>" 
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
					                            <a class="spotlight-small__btn btn btn--primary link-reset" href="<?php echo get_permalink($value->ID) ?>">
					                              <?php _e( 'Se', 'visithalland' ); ?> <?php echo $value->post_title ?>
					                            </a>
					                        </div>
					                    </div>
					                </div>
					            </div>
				            <?php endif ?>
	                <?php endforeach ?>
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
	    
	    <div class="featured-articles mt6 col-11 md-col-10 lg-col-10 mx-auto">  
		        <div class="clearfix mxn2">  
		            <?php
		                $featuredArticles = vh_get_posts_by_taxonomy_concept($post->ID);
		                foreach ($featuredArticles as $key => $value): ?>
		                    <article class="article-medium px2 col col-12 sm-col-4 md-col-4 <?php echo vh_get_taxonomyslug_by_string(vh_get_post_taxonomy()['slug']) ?>">
		                        <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
		                            <div class="article-medium__img-container topographic-pattern">
		                                <picture>
		                                    <source media="(min-width: 40em)"
		                                        data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
		                                    <source
		                                        data-srcset="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
		                                    <img class="article-medium__img" data-src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" />
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

</div>

<div class="next-post-link">
    <div id="nextPages" data-all='<?php echo json_encode(vh_get_next_previous_link()) ?>'></div>
</div>

<!-- Working on infinite scroll feedback -->
<div class="container">
    <!-- <div class="infinite-scroll">
        
    </div> -->
    <div class="page-load-status">
        <p class="infinite-scroll-request">Hämtar nästa artikel</p>
        <p class="infinite-scroll-last">Slut på innehåll</p>
        <p class="infinite-scroll-error">Kunde inte hitta fler artiklar</p>
    </div>
</div>
 <!--- End Infinite Scroll -->
<?php get_footer(); ?>