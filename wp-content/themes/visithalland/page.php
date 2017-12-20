<?php get_header(); ?>

<?php echo the_post_thumbnail_url(); ?>

<main role="main" class="container" id="main-content">

	<?php /* START - ConceptHeader */ ?>
	<section class="concept-header relative overflow-hidden <?php echo $post->post_name ?>" role="heading">
	    <div class="concept-header__img-container topographic-pattern">
	            <picture>
	                <source media="(min-width: 60em)"
	                    srcSet="<?php echo get_field("cover_image")['url']; ?>"/>
	                <source
	                    srcSet="<?php echo get_field("cover_image")['url']; ?>"/>
	                <img class="concept-header__img" src="<?php echo get_field("cover_image")['url']; ?>" alt="TODO" />
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
		
	<?php /* START - ArticleFull */ ?>
</main>

<?php get_footer(); ?>