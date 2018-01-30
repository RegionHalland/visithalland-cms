<?php get_header(); ?>


<?php /* Template Name: Happening Page */ ?>


<?php while ( have_posts() ) : the_post(); 

	$author_id = get_the_author_meta('ID');

?>


	<article class="container" role="main" id="main-content">
		<div class="happening-page-header">
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
	            </div>
			</div>
		</div>
		<article class="happening-large col-11 md-col-10 lg-col-8 mx-auto z4 relative mt4">
						<div class="happening-large__img-container">
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
		                <div class="clearfix my4">
		                	<div class="col col-12 sm-col-6">
		                		<h2 class="happening-large__title">Summerburst super fest</h2>
		                		<div class="col col-6">
		                			<div class="happening-large__info">
		                				<span class="happening-large__info-title block">
		                					Datum
		                				</span>
		                				<span class="happening-large__date block">
		                					14 Jan
		                				</span>
		                			</div>
		                		</div>
		                		<div class="col col-6">
		                			<div class="happening-large__info">
		                				<span class="happening-large__info-title block">
		                					Länk
		                				</span>
		                				<a class="btn btn--primary inline-block coastal-living" href="">Besök webbplats</a>
		                			</div>
		                		</div>
		                	</div>
		                	<div class="col col-12 sm-col-6">
		                		<p class="happening-large__excerpt">Det här är en sida för det alla älskar. Happenings, events, kul saker att göra... you name it. Så ta fram kalendern och den röda spritpennan och gör dig redo för semestern.</p>
		                	</div>
		                </div>
		            </article>


	    <div class="happening-page__grid col-11 md-col-10 lg-col-8 mx-auto">
	    	
	    </div>	
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>