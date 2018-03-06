<?php get_header(); ?>

<?php
// get the current taxonomy term
$term = get_queried_object(); ?>

<div class="container">
<main role="main" class="container" id="main-content">

	<?php /* START - ConceptHeader */ ?>
		<section class="concept-header relative overflow-hidden <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>" role="heading">
		    <div class="concept-header__img-container topographic-pattern">
		    	<picture>
				    <source media="(min-width: 60em)"
				        data-srcset="<?php echo get_field("cover_image", $term)["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
				    <source
				        data-srcset="<?php echo get_field("cover_image", $term)["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", $term)["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
				    <img class="concept-header__img lazyload" data-src="<?php echo get_field("cover_image", $term)["sizes"]["vh_hero_wide"] ?>" 
				    	alt="<?php echo get_field("cover_image", $term)["alt"] ?>" />
				</picture>
		    </div>
		    <div class="concept-header__content clearfix col-11 sm-col-11 md-col-10 lg-col-10 absolute mx-auto bottom-0 left-0 right-0">
		        <div class="col col-12 sm-col-7 md-col-10 lg-col-5">
		            <h1 class="concept-header__title mt0 mb2 light">
		                <div class="concept-header__icon mr3 inline-block"></div>
		                <span><?php echo $term->name ?></span>
		            </h1>
		        </div>
		        <div class="col col-12 sm-col-7 md-col-6 lg-col-5">
		            <p class="concept-header__intro light"><?php the_field("excerpt", $term); ?></p>
		        </div>
		    </div>
		</section>
	<?php /* END - ConceptHeader */ ?>
	
		<?php /* START - NavigationCarousel */ ?>
			<?php
				$spotlights = vh_get_spotlights_by_taxonomy_concept($term);
				if (count($spotlights)) : ?>
					<div class="concept-carousel clearfix">
						<div class="slider-button-container relative z3 py3 col-11 md-col-10 lg-col-10 mx-auto">
							<button class="slider-button navigation-carousel--previous">
								<svg class="icon slider-button__icon">
		                            <use xlink:href="#arrow-left-icon"/>
		                        </svg>
							</button>
							<button class="slider-button navigation-carousel--next">
								<svg class="icon slider-button__icon">
		                            <use xlink:href="#arrow-right-icon"/>
		                        </svg>
		                    </button>
						</div>
						<div class="navigation-carousel relative z3 col-11 md-col-10 lg-col-10 mx-auto">
							<?php foreach ($spotlights as $key => $value) : ?>				
								<div class="page-thumbnail col-6 sm-col-5 md-col-3 lg-col-3 center <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
								    <a href="<?php echo get_permalink($value->ID) ?>">
										<?php 
								        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
											  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

										?>
								        <div class="page-thumbnail__img-container topographic-pattern">
								            <div class="page-thumbnail__concept-badge"></div>
								            <picture>
							            		<source
						                            data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" ?>" />

						                        <img class="page-thumbnail__img lazyload"
						                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ); ?>" 
						                                alt="<?php echo $alt; ?>"  
						                        />
						                        
						                    </picture>	
								        </div>
								        <h3 class="page-thumbnail__title mt3 mb2"><?php echo $value->post_title ?></h3>
								        <div class="read-more">
									    	<span class="read-more__text"><?php _e( 'Läs mer', 'visithalland' ); ?></span>
									    	<div class="read-more__button">
										    	<svg class="icon read-more__icon">
			                                    	<use xlink:href="#arrow-right-icon"/>
			                                	</svg>
		                                	</div>
									    </div>
								    </a>
								</div>
							<?php endforeach ?>
						</div>
					</div>
			<?php endif ?>
		<?php /* END - NavigationCarousel */ ?>
		

		<?php /* START - Featured Articles */ ?>
		<div class="featured-articles relative z3 col-11 md-col-10 lg-col-10 mx-auto <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
			<div class="clearfix">
				<header class="featured-articles__header">
					<div class="featured-articles__badge inline-block">
						<svg class="icon featured-articles__icon">
                        	<use xlink:href="#recommend-icon"/>
                    	</svg>
					</div>
					<div class="featured-articles__title inline-block ml2"><?php _e( 'Vi rekommenderar', 'visithalland' ); ?></div>
				</header>
				<div class="featured-articles__primary col col-12 lg-col-8 relative">

					<?php /* START Featured Article Large */ ?>
						<article class="article-large <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
			                    <a href="<?php echo get_permalink(get_field("featured", $term)[0]->ID) ?>" class="link-reset">
			                        <div class="article-large__img-container topographic-pattern">
			                        	<div class="article-tag absolute top-0 left-0 mt2 ml2 z3">
											<div class="article-tag__icon-wrapper">
												<div class="article-tag__icon"></div>
											</div>
										</div>
										<?php 
								        	  $thumbnail_id = get_post_thumbnail_id(get_field("featured", $term)[0]->ID);
											  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

										?>
										<picture>
											<source media="(min-width: 40em)" data-srcset="<?php echo get_the_post_thumbnail_url(get_field("featured", $term)[0]->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url(get_field("featured", $term)[0]->ID, 'vh_large@2x' ) . " 2x" ?>" />
											<source data-srcset="<?php echo get_the_post_thumbnail_url(get_field("featured", $term)[0]->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url(get_field("featured", $term)[0]->ID, 'vh_medium@2x' ) . " 2x" ?>" />
											<img class="article-large__img z2 lazyload" 
												data-src="<?php echo get_the_post_thumbnail_url(get_field("featured", $term)[0]->ID, 'vh_medium' )?>"
												alt="<?php echo $alt ?>" />
										</picture>
			                        </div>
			                        <div class="article-large__content mt3 clearfix">
			                            <div class="col col-12 sm-col-5">
			                                <h2 class="article-large__title pt0"><?php echo get_field("featured", $term)[0]->post_title ?></h2>
			                            </div>
			                            <div class="col col-12 sm-col-7 article-large__right-col">
			                                <p class="article-large__excerpt mt0"><?php echo get_field("excerpt", get_field("featured", $term)[0]->ID) ?></p>
			                                <div class="read-more">
										    	<span class="read-more__text"><?php _e( 'Läs mer', 'visithalland' ); ?></span>
										    	<div class="read-more__button">
											    	<svg class="icon read-more__icon">
				                                    	<use xlink:href="#arrow-right-icon"/>
				                                	</svg>
			                                	</div>
										    </div>
			                            </div>
			                        </div>
			                    </a>
			            </article>
		            <?php /* END Featured Article Large */ ?>

				</div>
				<div class="featured-articles__secondary col col-12 lg-col-4 p0">
				    <div class="clearfix">
				        <div class="featured-article__left col col-12 sm-col-6 lg-col-12 mt4 p0">
				        	
				        	<?php /* START - ArticleMedium */ ?>
							<article class="article-medium <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
								<a href="<?php echo get_permalink(get_field("featured", $term)[1]->ID) ?>" class="link-reset">
								    <div class="article-medium__img-container topographic-pattern">
								    	<div class="article-tag absolute top-0 left-0 mt2 ml2 z3">
											<div class="article-tag__icon-wrapper">
												<div class="article-tag__icon"></div>
											</div>
										</div>
										<?php 
								        	  $thumbnail_id = get_post_thumbnail_id(get_field("featured", $term)[1]->ID);
											  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

										?>
										<picture>
											<source data-srcset="<?php echo get_the_post_thumbnail_url(get_field("featured", $term)[1]->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url(get_field("featured", $term)[1]->ID, 'vh_medium@2x' ) . " 2x" ?>" />
											<img class="article-medium__img lazyload" 
												data-src="<?php echo get_the_post_thumbnail_url(get_field("featured", $term)[1]->ID, 'vh_medium' )?>"
												alt="<?php echo $alt ?>" />
										</picture>
								    </div>
								    <div class="article-medium__content mt3">
										<h3 class="article-medium__title mb1 mt1 pt0"><?php echo get_field("featured", $term)[1]->post_title ?></h3>
										<p class="article-medium__excerpt mt2"><?php echo get_field("excerpt", get_field("featured", $term)[1]->ID) ?></p>
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
							<?php /* END - ArticleMedium */ ?>

				        </div>
				        <div class="featured-article__right col col-12 sm-col-6 lg-col-12 mt4 p0">
				        	<?php /* START - ArticleMedium */ ?>
								<article class="article-medium <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
									<a href="<?php echo get_permalink(get_field("featured", $term)[2]->ID) ?>" class="link-reset">
									    <div class="article-medium__img-container topographic-pattern">
									    	<div class="article-tag absolute top-0 left-0 mt2 ml2 z3">
												<div class="article-tag__icon-wrapper">
													<div class="article-tag__icon"></div>
												</div>
											</div>
											<?php 
									        	  $thumbnail_id = get_post_thumbnail_id(get_field("featured", $term)[1]->ID);
												  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
											?>
											<picture>
												<source data-srcset="<?php echo get_the_post_thumbnail_url(get_field("featured", $term)[2]->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url(get_field("featured", $term)[2]->ID, 'vh_medium@2x' ) . " 2x" ?>" />
												<img class="article-medium__img lazyload" 
													data-src="<?php echo get_the_post_thumbnail_url(get_field("featured", $term)[2]->ID, 'vh_medium' )?>"
													alt="<?php echo $alt; ?>" />
											</picture>
									    </div>
									    <div class="article-medium__content mt3">
											<h3 class="article-medium__title mb1 mt1 pt0"><?php echo get_field("featured", $term)[2]->post_title ?></h3>
											<p class="article-medium__excerpt mt2"><?php echo get_field("excerpt", get_field("featured", $term)[2]->ID) ?></p>
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
									</a>
								</article>
							<?php /* END - ArticleMedium */ ?>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	<?php /* END - Featured Articles */ ?>

	<?php /* START - ArticleFull */ ?>
		<?php $meet_local = count(vh_get_meet_local_by_taxonomy_concept($term)) > 0 ? vh_get_meet_local_by_taxonomy_concept($term)[0] : null ?>
		<?php if(isset($meet_local)) : ?>
			<article class="article-full relative my5 <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
				<div class="article-full__img-container topographic-pattern">
					<?php 
			        	  $thumbnail_id = get_post_thumbnail_id( $meet_local->ID );
						  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
					?>
				    <picture>
						<source media="(min-width: 40em)" data-srcset="<?php echo get_the_post_thumbnail_url( $meet_local->ID, 'vh_hero_wide' ) . " 1x," . get_the_post_thumbnail_url( $meet_local->ID, 'vh_hero_wide@2x' ) . " 2x" ?>" />

		                <source data-srcset="<?php echo get_the_post_thumbnail_url( $meet_local->ID, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $meet_local->ID, 'vh_hero_tall@2x' ) . " 2x" ?>" />

		                 <img class="article-full__img lazyload"
	                            data-src="<?php echo get_the_post_thumbnail_url( $meet_local->ID, 'vh_hero_wide' ); ?>" 
	                            alt="<?php echo $alt ?>"  
	                    />
				    </picture>
				</div>
				<div class="article-full__scrim absolute left-0 right-0 bottom-0 z1"></div>
				<div class="article-full__inner absolute bottom-0 left-0 right-0 z2 clearfix">
					<div class="article-full__content col col-12 md-col-6 lg-col-6">

						<div class="article-tag--light mt3 mb2">
							<div class="article-tag__icon-wrapper">
								<div class="article-tag__icon"></div>
							</div>
							<span class="article-tag__type">
								<?php echo vh_get_pretty_post_type_name($meet_local->post_type) ?>
							</span>
						</div>
					    
					    <a href="<?php echo get_permalink($meet_local->ID) ?>" class="link-reset article-full__link link light">
					        <h2 class="article-full__title light mt1"><?php echo $meet_local->post_title ?></h2>
					        <p class="article-full__excerpt mb2"><?php echo get_field("excerpt", $meet_local->ID) ?></p>
					        <div class="read-more mt3 inline-block">
						    	<span class="read-more__text light">
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
			</article>
		<?php endif; ?>
	<?php /* END - ArticleFull */ ?>


	<?php /* START - POST grid */ ?>
		<div class="concept-content relative mt2 col-11 md-col-10 lg-col-10 mx-auto">
		    <div class="concept-grid col col-12 md-col-12 lg-col-8 no-gutter">
		        <div class="clearfix mxn2">
		        	<?php
		        		$posts_without_place_happening_business = vh_get_posts_by_taxonomy_concept(null, $term, -1);
		        		foreach ($posts_without_place_happening_business as $index => $value) : ?>
		        			<?php if(($index + 1) % 3 === 0) : ?>
		        				<div class="concept-grid__item col col-12">
								<article class="article-image relative <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
									<div class="article-image__img-container topographic-pattern">

										<?php 
								        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
											  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
										?>
										<picture>

											<source media="(min-width:40em)""
				                            	data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_large@2x' ) . " 2x" ?>" />

					            			<source
				                            	data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_hero_tall' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_hero_tall@2x' ) . " 2x" ?>" />

					                        <img class="article-image__img lazyload"
					                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_large' ); ?>" 
					                                alt="<?php echo $alt ?>"  
					                        />
					                        
					                    </picture>	
									</div>
									<a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
										<div class="article-image__content absolute left-0 bottom-0">
											<div class="article-tag--light mt3 mb2">
												<div class="article-tag__icon-wrapper">
													<div class="article-tag__icon"></div>
												</div>
												<span class="article-tag__type">
													<?php echo vh_get_pretty_post_type_name($value->post_type) ?>
												</span>
											</div>
											<h2 class="article-image__title light my1"><?php echo $value->post_title ?></h2>
											<div class="read-more">
										    	<span class="read-more__text light">
										    		<?php _e( 'Läs mer', 'visithalland' ); ?>
										    	</span>
										    	<div class="read-more__button">
											    	<svg class="icon read-more__icon">
				                                    	<use xlink:href="#arrow-right-icon"/>
				                                	</svg>
			                                	</div>
										    </div>
										</div>
									</a>
								</article>
		        				</div>
		        			<?php else: ?>
		        				<div class="concept-grid__item col col-12 sm-col-6">
									<article class="article-medium relative <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
										<a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
											<div class="article-medium__img-container relative topographic-pattern">
												<div class="article-tag mt2 ml2 absolute z3 left-0 top-0">
													<div class="article-tag__icon-wrapper">
														<div class="article-tag__icon"></div>
													</div>
												</div>
												<?php 
										        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
													  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
												?>
												<picture>
							            			<source
						                            	data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" ?>" />

							                        <img class="article-medium__img lazyload"
							                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_medium' ); ?>" 
							                                alt="<?php echo $alt ?>"  
							                        />
							                        
							                    </picture>	
											</div>
											<div class="article-medium__content mt3 <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
											    <h3 class="article-medium__title mb1 mt1 pt0"><?php echo $value->post_title ?></h3>
											    <p class="article-medium__excerpt mt2"><?php the_field("excerpt", $value->ID) ?></p>
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
										</a>
									</article>
		        				</div>
		        			<?php endif ?>
		       			<?php endforeach ?>
				</div>
		    </div>
			<?php /* END - POST grid */ ?>
				

			<?php /* START - CONCEPT SIDEBAR */ ?>
		    <div class="concept-sidebar col col-12 lg-col-4">
		    	<?php 
					$happenings = vh_get_happenings_by_taxonomy_concept($term, 10);
				?>

				<?php if (count($happenings) > 0) : ?>
		        	<div class="concept-happenings mb5 clearfix mxn2">
		        		<header class="concept-sidebar__header px2 <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
							<div class="concept-sidebar__badge inline">
								<svg class="icon concept-sidebar__icon">
		                        	<use xlink:href="#calendar-icon"/>
		                    	</svg>
							</div>
							<div class="concept-sidebar__title inline ml2">
								<?php _e( 'Kul happenings', 'visithalland' ); ?>
							</div>
						</header>
			            <?php foreach ($happenings as $index => $value) : ?>
			            	<div class="concept-happenings__item col col-12 sm-col-6 lg-col-12 px2">
							    <article class="happening-list-item <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
					                <a href="<?php echo get_permalink($value->ID) ?>" class="link-reset">
					                    <div class="clearfix">
					                        <div class="col col-5 sm-col-4 ">
					                            <div class="happening-list-item__img-container topographic-pattern relative">
					                            	<?php 
											        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
														  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
													?>
					                            	<picture>
	 													<source
	                                            			data-srcset="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail@2x' ) . " 2x" ?>" />
	                                            		<img class="happening-list-item__img lazyload"
							                                data-src="<?php echo get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ); ?>" 
							                                alt="<?php echo $alt ?>"  
							                        	/>
	                                    			</picture>
					                            </div>
					                        </div>
					                        <div class="happening-list-item__date">
												<div class="date-badge">
												    <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); ?></span>
												    <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date", $value->ID))); ?></span>
												</div>
					                        </div>
					                        <div class="happening-list-item__content col col-7 sm-col-8">
					                            <h4 class=""><?php echo $value->post_title ?></h4>
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
					                </a>
					            </article>
			            	</div>
			        	<?php endforeach ?>
		        	</div>
		        <?php endif ?>

		        <div class="concept-thumbnails clearfix mxn2">
		        	<header class="concept-sidebar__header px2 <?php echo get_term_for_default_lang($term, "taxonomy_concept")->slug ?>">
						<div class="concept-sidebar__badge inline">
							<svg class="icon concept-sidebar__icon">
	                        	<use xlink:href="#discover-icon"/>
	                    	</svg>
						</div>
						<div class="concept-sidebar__title inline ml2">
							<?php _e( 'Mer att upptäcka', 'visithalland' ); ?>
						</div>
					</header>
					<?php
					$langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
                	$menuItems = wp_get_nav_menu_items("huvudmeny" . $langMenuCode);
					foreach ($menuItems as $key => $value): ?>
					<?php
						$term_id = get_post_meta($value->ID, '_menu_item_object_id', true);
						$current_term = get_term($term_id);
						$current_term_cover_image = get_field("cover_image", $current_term);
					?>
					<div class="concept-thumbnails__item col col-12 sm-col-6 lg-col-12 px2 <?php echo get_term_for_default_lang($current_term, "taxonomy_concept")->slug ?>">
						<div class="concept-thumbnail-small">
		                       <a href="<?php echo $value->url ?>" class="link-reset">
		                            <div class="concept-thumbnail-small__img-container">
	                                    <picture>
	                                    	<source media="(min-width:40em)"
	                                            data-srcset="<?php echo $current_term_cover_image["sizes"]["vh_medium_square"] . " 1x," . $current_term_cover_image["sizes"]["vh_medium_square@2x"] . " 2x" ?>" />
	                                        <source
	                                            data-srcset="<?php echo $current_term_cover_image["sizes"]["vh_medium"] . " 1x," . $current_term_cover_image["sizes"]["vh_medium@2x"] . " 2x" ?>" />
	                                        <img class="concept-thumbnail-small__img lazyload" data-src="<?php echo $current_term_cover_image["sizes"]["vh_medium"] ?>" alt="<?php echo $current_term_cover_image["alt"] ?>" />
	                                    </picture>
		                                <div class="concept-thumbnail-small__inner center">
		                                    <div class="concept-thumbnail-small__icon mx-auto mb2"></div>
		                                    <h2 class="concept-thumbnail-small__title"><?php echo $value->title ?></h2>
		                                </div>
		                            </div>
		                        </a>
		                </div>
	            	</div>
					<?php endforeach ?>
		        </div>
		    </div>
		</div>
		<?php /* END - CONCEPT SIDEBAR  */ ?>
</main>
</div>
<?php get_footer(); ?>