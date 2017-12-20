<?php get_header(); ?>

<?php echo the_post_thumbnail_url(); ?>

<main role="main" class="container" id="main-content">

	<?php /* START - ConceptHeader */ ?>
	<section class="concept-header relative overflow-hidden <?php echo $post->post_name ?>" role="heading">
	    <div class="concept-header__img-container topographic-pattern">
			<picture>
			    <source media="(min-width: 60em)"
			        srcSet="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image")["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
			    <source
			        srcSet="<?php echo get_field("cover_image")["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image")["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
			    <img className="concept-header__img" src="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image")["alt"] ?>" />
			</picture>
	    </div>
	    <div class="concept-header__content clearfix absolute mx-auto bottom-0 left-0 right-0">
	        <div class="col col-12 sm-col-7 md-col-10 lg-col-5">
	            <h1 class="concept-header__title mt0 mb2 light">
	                <div class="concept-header__icon mr3 inline-block"></div>
	                <span><?php the_title(); ?></span>
	            </h1>
	        </div>
	        <div class="col col-12 sm-col-7 md-col-6 lg-col-5">
	            <p class="concept-header__intro light"><?php the_field("excerpt"); ?></p>
	        </div>
	    </div>
	</section>
	<?php /* END - ConceptHeader */ ?>

	<div class="concept-carousel relative z4">
		<?php /* START - NavigationCarousel */ ?>

		<?php /* END - NavigationCarousel */ ?>
	</div>


	<div class="featured-articles relative z4 clearfix">
		<div class="featured-articles__primary col col-12 lg-col-8 relative">
			<article class="article-large <?php echo vh_get_post_taxonomy()["slug"] ?>">
                    <a href="<?php echo get_field("featured")[0]->guid ?>" class="link-reset">
                        <div class="article-large__img-container topographic-pattern">
							<picture>
								<source media="(min-width: 40em)"
									srcSet="<?php echo get_field("cover_image", get_field("featured")[0]->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", get_field("featured")[0]->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
								<source
									srcSet="<?php echo get_field("cover_image", get_field("featured")[0]->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", get_field("featured")[0]->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
								<img class="concept-header__img" src="<?php echo get_field("cover_image", get_field("featured")[0]->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", get_field("featured")[0]->ID)["alt"] ?>" />
							</picture>
                        </div>
                        <div class="article-large__content clearfix">
							<div class="article-tag mt3 mb2">
								<div class="article-tag__icon-wrapper">
									<div class="article-tag__icon"></div>
								</div>
								<span class="article-tag__type">
									<?php echo vh_get_pretty_post_type_name(get_field("featured")[0]->post_type) ?>
								</span>
							</div>

                            <div class="col col-12 sm-col-5">
                                <h2 class="article-large__title pt0"><?php echo get_field("featured")[0]->post_title ?></h2>
                            </div>
                            <div class="col col-12 sm-col-7">
                                <p class="article-large__excerpt mt0"><?php echo get_field("excerpt", get_field("featured")[0]->ID) ?></p>
                            </div>
                        </div>
                    </a>
            </article>
		</div>


		<div class="featured-articles__secondary col col-12 lg-col-4 p0">
		    <div class="clearfix">
		        <div class="featured-article__left col col-12 sm-col-6 lg-col-12 mt4 p0">
		        	<?php /* START - ArticleMedium */ ?>
					<article class="article-medium <?php echo vh_get_post_taxonomy()["slug"] ?>">
						<a href="<?php echo get_field("featured")[1]->guid ?>" class="link-reset">
						    <div class="article-medium__img-container topographic-pattern">
								<picture>
									<source media="(min-width: 40em)"
										srcSet="<?php echo get_field("cover_image", get_field("featured")[1]->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", get_field("featured")[1]->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
									<source
										srcSet="<?php echo get_field("cover_image", get_field("featured")[1]->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", get_field("featured")[1]->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
									<img class="concept-header__img" src="<?php echo get_field("cover_image", get_field("featured")[1]->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", get_field("featured")[1]->ID)["alt"] ?>" />
								</picture>
						    </div>
						    <div class="article-medium__content">
								<div class="article-tag mt3 mb2">
									<div class="article-tag__icon-wrapper">
										<div class="article-tag__icon"></div>
									</div>
									<span class="article-tag__type">
										<?php echo vh_get_pretty_post_type_name(get_field("featured")[1]->post_type) ?>
									</span>
								</div>

								<h3 class="mb1 mt1 pt0"><?php echo get_field("featured")[1]->post_title ?></h3>
								<p class="mt2"><?php echo get_field("excerpt", get_field("featured")[1]->ID) ?></p>
						    </div>
						</a>
					</article>
					<?php /* END - ArticleMedium */ ?>
		        </div>
		        <div class="featured-article__right col col-12 sm-col-6 lg-col-12 mt4 p0">
		        	<?php /* START - ArticleMedium */ ?>
						<article class="article-medium <?php echo vh_get_post_taxonomy()["slug"] ?>">
							<a href="<?php echo get_field("featured")[2]->guid ?>" class="link-reset">
							    <div class="article-medium__img-container topographic-pattern">
									<picture>
										<source media="(min-width: 40em)"
											srcSet="<?php echo get_field("cover_image", get_field("featured")[2]->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", get_field("featured")[2]->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
										<source
											srcSet="<?php echo get_field("cover_image", get_field("featured")[2]->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", get_field("featured")[2]->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
										<img class="concept-header__img" src="<?php echo get_field("cover_image", get_field("featured")[2]->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", get_field("featured")[2]->ID)["alt"] ?>" />
									</picture>
							    </div>
							    <div class="article-medium__content">
									<div class="article-tag mt3 mb2">
										<div class="article-tag__icon-wrapper">
											<div class="article-tag__icon"></div>
										</div>
										<span class="article-tag__type">
											<?php echo vh_get_pretty_post_type_name(get_field("featured")[2]->post_type) ?>
										</span>
									</div>
									
									<h3 class="mb1 mt1 pt0"><?php echo get_field("featured")[2]->post_title ?></h3>
									<p class="mt2"><?php echo get_field("excerpt", get_field("featured")[2]->ID) ?></p>
							    </div>
							</a>
						</article>
					<?php /* END - ArticleMedium */ ?>
		        </div>
		    </div>
		</div>
	</div>

	<?php //wp_die(print_r(vh_get_meet_local_by_taxonomy_concept()[0]->post_title)); ?>

	<?php /* START - ArticleFull */ ?>
	<?php if(isset(vh_get_meet_local_by_taxonomy_concept()[0])) : ?>
		<article class="article-full relative my5">
			<div class="article-full__img-container topographic-pattern">
			    <picture>
					<source media="(min-width: 768px)"
						srcSet="<?php echo get_field("cover_image", vh_get_meet_local_by_taxonomy_concept()[0]->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", vh_get_meet_local_by_taxonomy_concept()[0]->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
					<source
						srcSet="<?php echo get_field("cover_image", vh_get_meet_local_by_taxonomy_concept()[0]->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", vh_get_meet_local_by_taxonomy_concept()[0]->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
					<img class="concept-header__img" src="<?php echo get_field("cover_image", vh_get_meet_local_by_taxonomy_concept()[0]->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", vh_get_meet_local_by_taxonomy_concept()[0]->ID)["alt"] ?>" />
			    </picture>
			</div>
			<div class="article-full__scrim absolute left-0 right-0 bottom-0 z1"></div>
			<div class="article-full__inner absolute bottom-0 left-0 right-0 z2 clearfix">
				<div class="article-full__content col col-12 md-col-6 lg-col-6 <?php echo vh_get_pretty_post_type_name(get_field("featured")[2]->post_type) ?>">

					<div class="article-tag mt3 mb2">
						<div class="article-tag__icon-wrapper">
							<div class="article-tag__icon"></div>
						</div>
						<span class="article-tag__type">
						<?php echo vh_get_pretty_post_type_name(vh_get_meet_local_by_taxonomy_concept()[0]->post_type) ?>
						</span>
					</div>
				    
				    <a href="<?php echo vh_get_meet_local_by_taxonomy_concept()[0]->guid ?>" class="link-reset article-full__link link light">
				        <h2 class="article-full__title light mt1 mb2"><?php echo vh_get_meet_local_by_taxonomy_concept()[0]->post_title ?></h2>
				        <p class="article-full__excerpt mb2"><?php echo get_field("excerpt", vh_get_meet_local_by_taxonomy_concept()[0]->ID) ?></p>
				        <div class="article-link inline-block mt0">
				            <hr class="article-link__divider block mb3"/>
				            <span class="article-link__text">Läs hela artikeln</span>
				            <span class="article-link__icon-wrapper">
				                <i class="material-icons article-link__icon">arrow_forward</i>
				            </span>
				        </div>
				    </a>
				</div>    
			</div>
		</article>
	<?php endif; ?>
	<?php /* END - ArticleFull */ ?>


	<?php /* START - POST grid */ ?>
		<div class="clearfix concept-content mt2">
		    <div class="concept-grid col col-12 md-col-12 lg-col-8 no-gutter">
		        <div class="clearfix mxn2">
		        	<?php 
		        		$posts = vh_get_posts_without_happenings_by_taxonomy_concept($post->ID, -1);
		        		foreach ($posts as $index => $value) : ?>
		        			<?php if(($index + 1) % 3 === 0) : ?>
		        				<div class="concept-grid__item col col-12">
								<article class="article-image relative <?php echo vh_get_post_taxonomy()["slug"] ?>">
									<div class="article-image__img-container topographic-pattern">
										<picture>
											<source media="(min-width: 700px)"
												srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
											<source
												srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
											<img class="concept-header__img" src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_large"] ?>" alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" />
										</picture>
									</div>
									<a href="<?php echo $value->guid ?>" class="link-reset">
										<div class="article-image__content absolute left-0 bottom-0">
											<div class="article-tag--light mt3 mb2">
												<div class="article-tag__icon-wrapper">
													<div class="article-tag__icon"></div>
												</div>
												<span class="article-tag__type">
													<?php echo vh_get_pretty_post_type_name(get_field("featured")[0]->post_type) ?>
												</span>
											</div>
											<h2 class="article-image__title light my1"><?php echo $value->post_title ?></h2>
											<div class="article-link inline-block mt0">
												<hr class="article-link__divider block mb3"/>
												<span class="article-link__text">Läs hela artikeln</span>
												<span class="article-link__icon-wrapper">
												<i class="material-icons article-link__icon">arrow_forward</i>
												</span>
											</div>
										</div>
									</a>
								</article>
		        				</div>
		        			<?php else: ?>
		        				<div class="concept-grid__item col col-12 sm-col-6">
									<article class="article-image relative <?php echo vh_get_post_taxonomy()["slug"] ?>">
										<a href="<?php echo $value->guid ?>" class="link-reset">
											<div class="article-medium__img-container topographic-pattern">
												<picture>
													<source
												    	srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
													<img class="article-medium__img" src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] ?>" alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" />
												</picture>
											</div>
											<div class="article-medium__content">
												<div class="article-tag mt3 mb2">
													<div class="article-tag__icon-wrapper">
														<div class="article-tag__icon"></div>
													</div>
													<span class="article-tag__type">
														<?php echo vh_get_pretty_post_type_name($value->post_type) ?>
													</span>
												</div>
											    <h3 class="mb1 mt1 pt0"><?php echo $value->post_title ?></h3>
											    <p class="mt2"><?php the_field("excerpt", $value->ID) ?></p>
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
		        <div class="concept-happenings clearfix">
		            <?php 
					$happenings = vh_get_happenings_by_taxonomy_concept($post->ID, 3);
		            foreach ($happenings as $index => $value) : ?>
		            	<div class="concept-happenings__item col col-12 sm-col-6 lg-col-12">
						    <article class="happening-list-item <?php echo vh_get_post_taxonomy()["slug"] ?>">
				                <a href="<?php echo $value->guid ?>" class="link-reset">
				                    <div class="clearfix">
				                        <div class="col col-5 sm-col-4 ">
				                            <div class="happening-list-item__img-container topographic-pattern relative">
				                            	<img class="happening-list-item__img" src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] ?>" alt=<?php echo get_field("cover_image", $value->ID)["alt"] ?> />
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
				                            <div class="article-link inline-block mt0">
				                                <hr class="article-link__divider block"/>
				                                <span class="article-link__text">Läs mer</span>
				                                <span class="article-link__icon-wrapper">
				                                    <i class="material-icons article-link__icon">arrow_forward</i>
				                                </span>
				                            </div>
				                        </div>
				                    </div>
				                </a>
				            </article>
		            	</div>
		        	<?php endforeach ?>
		        </div>

		        <div class="concept-thumbnails clearfix">
					<?php
					$menuItems = wp_get_nav_menu_items("huvudmeny");
					foreach ($menuItems as $key => $value): ?>
					<?php
						$post_id = get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))->ID;
						$featured_id = get_field("featured", get_post(get_post_meta( $post_id, '_menu_item_object_id', true )))[0]->ID;
					?>
					<div class="concept-thumbnails__item col col-12 sm-col-6 lg-col-12">
						<div class="concept-thumbnail-small <?php echo get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))->post_name ?>">
		                       <a href="<?php echo $value->url ?>" class="link-reset">
		                            <div class="concept-thumbnail-small__img-container">
	                                    <picture>
	                                        <source media="(min-width: 40em)"
	                                            srcSet="<?php echo get_field("cover_image", $post_id)["sizes"]["vh_hero_tall"] . " 1x," . get_field("cover_image", $post_id)["sizes"]["vh_hero_tall@2x"] . " 2x" ?>" />
	                                        <source
	                                            srcSet="<?php echo get_field("cover_image", $post_id)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", $post_id)["sizes"]["vh_large"] . " 2x" ?>" />
	                                        <img class="concept-thumbnail-small__img" src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_tall"] ?>" alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" />
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

<?php get_footer(); ?>