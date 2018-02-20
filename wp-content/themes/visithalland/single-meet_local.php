<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    $post_id = get_the_id();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    
?>
<div id="infinite-container">
	<article class="container <?php echo get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug ?>" role="main" id="main-content">
	    <section class="meet-a-local-header">
	        <div class="meet-a-local-header__img-container topographic-pattern">
	        	<picture>

	            	<source media="(min-width: 40em)" data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_hero_wide@2x' ) . " 2x" ?>" />

	                <source data-srcset="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $post_id, 'vh_hero_tall@2x' ) . " 2x" ?>" />

	                 <img class="meet-a-local-header__img lazyload"
                            data-src="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_hero_wide' ); ?>" 
                            alt="<?php echo $alt ?>"  
                    />
                    
	            </picture>
	        </div>
	        <div class="meet-a-local-header__inner col-12 md-col-10 lg-col-8 mx-auto">
	            <div class="meet-a-local-header__content center">
	                <div class="article-tag">
	                    <div class="article-tag__icon-wrapper">
	                        <div class="article-tag__icon"></div>
	                    </div><span class="article-tag__type"><?php echo vh_get_pretty_post_type_name($post->post_type) ?></span></div>
	                <h1 class="meet-a-local-header__title h1 mb3 center mt2"><?php the_title(); ?></h1>
	                <p class="meet-a-local-header__preamble center"><?php the_field("excerpt") ?></p>
	                <address class="author-vertical mt4 mb4">
                        <div class="author-vertical__img-container">
                            <img 
                                data-src="<?php echo get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"]; ?>" 
                                alt="'Skrivet av: ' + <?php the_author_meta('display_name'); ?>" 
                                class="author-vertical__img lazyload"
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
	        </div>
    	</div>
    	<div class="slider-button-container relative mt4 z4 py3 col-11 md-col-10 lg-col-10 mx-auto"">
			<button class="slider-button tip-carousel--previous">
				<svg class="icon slider-button__icon">
                    <use xlink:href="#arrow-left-icon"/>
                </svg>
			</button>
			<button class="slider-button tip-carousel--next">
				<svg class="icon slider-button__icon">
                    <use xlink:href="#arrow-right-icon"/>
                </svg>
			</button>
		</div>
	    <section class="tip-carousel col-11 md-col-10 lg-col-10 mx-auto mx-auto clearfix">
    			<?php 

					if( have_rows('tips') ):

					    while( have_rows('tips') ) : the_row();

					        $value = get_sub_field('tip'); 

					        ?>
								<div class="tip col col-10 sm-col-8 md-col-5">
		                            <div class="tip__img-container topographic-pattern">
		                            	<?php 
								        	  $thumbnail_id = get_post_thumbnail_id( $value[0]->ID );
											  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
										?>
		                                <picture>
					            			<source
				                            	data-srcset="<?php echo get_the_post_thumbnail_url( $value[0]->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value[0]->ID, 'vh_medium@2x' ) . " 2x" ?>" />

					                        <img class="tip__img lazyload"
					                                data-src="<?php echo get_the_post_thumbnail_url( $value[0]->ID, 'vh_medium' ); ?>" 
					                                alt="<?php echo $alt ?>"  
					                        />
					                        
					                    </picture>	
		                            </div>
		                            <div class="tip__content inline-block">

		                                <h3 class="mt3 tip__title">
		                                	<?php if (get_field("title", $value[0]->ID) != '') : ?>
													
												<?php echo the_field("title", $value[0]->ID) ?>

											<?php else : ?>

												<?php echo $value[0]->post_title ?>

											<?php endif ?>
										</h3>
		                                <p class="my3 tip__quote"><?php the_sub_field('quote', $value[0]->ID)?></p>
		                                <div class="tip__links">
		                                    <a class="link-reset" href="<?php echo get_permalink($value[0]->ID) ?>">
		                                        <div class="read-more inline-block">
											    	<span class="read-more__text">
											    		<?php _e( 'Läs mer', 'visithalland' ); ?>
											    	</span>
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

					    <?php endwhile;

					endif;
					?>
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