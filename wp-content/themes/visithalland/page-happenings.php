<?php get_header(); ?>


<?php /* Template Name: Happening Page */ ?>


<?php while ( have_posts() ) : the_post(); 

	$author_id = get_the_author_meta('ID');
	$term = get_queried_object(); ?>



	<article class="container relative" role="main" id="main-content">
		<div class="happening-page-header">
			<div class="happening-page-header__backdrop topographic-pattern">
			</div>
			<div class="happening-page-header__inner col-11 md-col-10 lg-col-8 mx-auto">
				<div class="clearfix">
					<div class="col col-12 sm-col-6">
						<h1 class="light mt3"><?php the_title(); ?></h1>
					</div>
					<div class="col col-12 sm-col-6">
						<div class="preamble light mt3"><?php the_content(); ?></div>
					</div>
	            </div>
			</div>
		</div>

		<?php $next = vh_get_happenings(1);

			foreach($next as $index => $value) : ?>

			<?php if($index === 0) : ?>

				<?php /* Next Happening Start */ ?>
				<article class="happening-large col-11 md-col-10 lg-col-8 mx-auto z4 relative mt4 <?php echo get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug ?>">
					<a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
						<div class="happening-large__img-container">
							<?php 
					        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
								  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
							?>
							<picture>
		                        <source media="(min-width: 40em)"
		                            data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_large@2x' ) . " 2x" ?>" />

		                        <source
		                            data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" ?>" />

		                        <img class="happening-large__img lazyload"
		                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_large' ); ?>" 
		                                alt="<?php echo $alt ?>"  
		                        />
		                        
		                    </picture>
			            </div>
			            <div class="clearfix my4">
			            	<div class="col col-12 sm-col-6">
			            		<h2 class="happening-large__title"><?php echo $value->post_title ?> </h2>
			            	</div>
			            	<div class="col col-12 sm-col-6">
			            		<p class="happening-large__excerpt"><?php the_field("excerpt", $value->ID) ?></p>
			            		<div class="col col-6">
			            			<div class="happening-large__info">
			            				<span class="happening-large__info-title block">
			            					<?php _e( 'Datum', 'visithalland' ); ?>
			            				</span>
			            				<span class="happening-large__date block">
			            					<span class=""><?php echo $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); ?></span>
											<span class=""><?php echo $dateobj = date("M", strtotime(get_field("start_date", $value->ID))); ?></span>
			            				</span>
			            			</div>
			            		</div>
			            		<div class="col col-6">
			            			<div class="happening-large__info">
			            				<span class="happening-large__info-title block">
			            					<?php _e( 'Länk', 'visithalland' ); ?>
			            				</span>
			            				<a 
			            					class="btn btn--primary inline-block coastal-living" 
			            					href="<?php echo get_field("external_links", $value->ID)[0]["link"]; ?>" 
			            					class="btn btn--primary inline-block">
			            					<?php _e( 'Mer information', 'visithalland' ); ?>
			            				</a>
			            			</div>
			            		</div>
			            	</div>
			            </div>
		        	</a>
		        </article>
		        <?php /* Next Happening End */ ?>


	        <?php endif ?>

    	<?php endforeach ?>

		<?php /* Happening Grid Start */ ?>
	    <div class="happening-page__grid col-11 md-col-10 lg-col-8 mx-auto my5">
	    	<div class="clearfix mt4 mxn2">

	    		<?php $happenings = vh_get_happenings(20);

	    			foreach($happenings as $index => $value) : ?>


			    		<div class="happening-page__grid-item col col-12 sm-col-6 md-col-4 px2 mt3">
							<article class="happening-medium relative <?php echo get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug ?>">
								<a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
									<div class="happening-medium__date z3">
										<div class="date-badge">
										    <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); ?></span>
										    <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date", $value->ID))); ?></span>
										</div>
			                        </div>
								    <div class="happening-medium__img-container topographic-pattern">
								    	<?php 
								        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
											  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
										?>
									    <picture>
					                        <source
					                            data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" ?>" />

					                        <img class="happening-medium__img lazyload z2"
					                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ); ?>" 
					                                alt="<?php echo $alt ?>"  
					                        />
					                        
					                    </picture>								    	
								    </div>
								    <div class="happening-medium__content mt2">
										<h3 class="happening-medium__title mb1 mt1 pt0"><?php echo $value->post_title ?></h3>
								    </div>
								    <a class="link-reset" href="<?php echo get_permalink($value->ID) ?>">
			                            <div class="read-more">
									    	<span class="read-more__text"><?php _e( 'Läs mer', 'visithalland' ); ?></span>
									    	<div class="read-more__button">
										    	<svg class="icon read-more__icon">
			                                    	<use xlink:href="#arrow-right-icon"/>
			                                	</svg>
		                                	</div>
									    </div>
								    </a>
								</a>
							</article>
			    		</div>


	    		<?php endforeach ?>

	    	</div>
	    </div>	
	    <?php /* Happening Grid End */ ?>


	</article>
<?php endwhile; ?>

<?php get_footer(); ?>