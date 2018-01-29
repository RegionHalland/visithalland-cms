<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

	$author_id = get_the_author_meta('ID');

?>


	<article class="container <?php echo vh_get_taxonomyslug_by_string(vh_get_post_taxonomy()['slug']) ?>" role="main" id="main-content">
		<div class="happening-happening-page-header">
			<div class="happening-page-header__backdrop topographic-pattern">
			</div>
			<div class="happening-page-header__inner col-11 md-col-10 lg-col-8 mx-auto">
				<div class="clearfix">
					<div class="col col-12 sm-col-6">
						<h1 class="light mt3"><?php the_title(); ?></h1>
					</div>
					<div class="col col-12 sm-col-6">
						<p class="preamble light mt3"><?php echo get_field('excerpt'); ?></p>
					</div>


					<article class="happening-large col-12">
						<picture>
		                    <source media="(min-width: 40em)"
		                        data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
		                    <source
		                        data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
		                    <img class="happening-large__img"
		                            data-src="<?php echo get_field("cover_image")["sizes"]["vh_large"] ?>" 
		                            alt="<?php echo get_field("cover_image")["alt"] ?>"  
		                    />
		                </picture>
	                </div>


				</div>
			</div>
		</div>
	    




	    <div class="col-11 md-col-10 lg-col-8 mx-auto">
	    	
	    </div>	
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>