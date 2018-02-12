<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    $post_id = get_the_id();
    
?>
<div id="infinite-container">
	<article class="container <?php echo vh_get_taxonomyslug_by_string(vh_get_post_taxonomy()['slug']) ?>" role="main" id="main-content">
	    <section class="spotlight-header">
	        <div class="spotlight-header__img-container">
	            <picture>

	            	<source media="(min-width: 40em)" data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_hero_wide@2x' ) . " 2x" ?>" />

	                <source data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_hero_tall@2x' ) . " 2x" ?>" />

	                 <img class="spotlight-header__img"
                            data-src="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_hero_wide' ); ?>" 
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
	                            <p><?php the_field('excerpt'); ?></p>

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

								            	<source media="(min-width: 40em)" data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_hero_wide@2x' ) . " 2x" ?>" />

								                <source data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_hero_tall@2x' ) . " 2x" ?>" />

								                 <img class="spotlight-large__img"
							                            data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_hero_wide' ); ?>" 
							                            alt="<?php echo get_field("cover_image")["alt"] ?>"  
							                    />

								            </picture>
					                    </div>
					                    <div class="spotlight-large__content col-12 lg-col-8 relative">
					                        <h2 class="spotlight-large__title mt2 p0 mb0"><?php echo $value->post_title ?></h2>
					                        <div class="spotlight-large__excerpt mt1">
					                            <p><?php the_field("excerpt", $value->ID); ?></p>
					                        </div>
					                        <div class="spotlight-large__links">
					                            <a class="link-reset" href="<?php echo get_permalink($value->ID) ?>">
						                            <div class="read-more">
												    	<span class="read-more__text light"><?php _e( 'Se', 'visithalland' ); ?> <?php echo $value->post_title ?></span>
												    	<div class="read-more__button">
													    	<svg class="icon read-more__icon">
						                                    	<use xlink:href="#arrow-right-icon"/>
						                                	</svg>
					                                	</div>
												    </div>
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
						            			<source
					                            	data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" ?>" />

						                        <img class="spotlight-small__img"
						                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ); ?>" 
						                                alt="<?php echo get_field("cover_image")["alt"] ?>"  
						                        />
						                        
						                    </picture>	
					                    </div>
					                    <div class="spotlight-small__content col-12 lg-col-12 relative">
					                        <h3 class="spotlight-small__title mb2 mt3 p0 mb0">

												<?php if (get_field("title", $value->ID) != '') : ?>
													
													<?php echo the_field("title", $value->ID) ?>

												<?php else : ?>

													<?php echo $value->post_title ?>

												<?php endif ?>

					                        </h3>
					                        <div class="spotlight-small__excerpt mt1">
					                            <p><?php the_field("excerpt", $value->ID); ?></p>
					                        </div>
					                        <div class="spotlight-small__links mt3">
					                            <a class="link-reset" href="<?php echo get_permalink($value->ID) ?>">
						                            <div class="read-more">
												    	<span class="read-more__text"><?php _e( 'Se', 'visithalland' ); ?> <?php echo $value->post_title ?></span>
												    	<div class="read-more__button">
													    	<svg class="icon read-more__icon">
						                                    	<use xlink:href="#arrow-right-icon"/>
						                                	</svg>
					                                	</div>
												    </div>
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
        <p class="infinite-scroll-request">Hämtar nästa artikel</p>
        <p class="infinite-scroll-last">Slut på innehåll</p>
        <p class="infinite-scroll-error">Kunde inte hitta fler artiklar</p>
    </div>
</div>
 <!--- End Infinite Scroll -->
<?php get_footer(); ?>