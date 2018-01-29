<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

	$author_id = get_the_author_meta('ID');

?>


	<article class="container <?php echo vh_get_post_taxonomy()['slug']; ?>" role="main" id="main-content">
		<div class="page-header">
			<div class="page-header__backdrop topographic-pattern">
			</div>
			<div class="page-header__inner col-11 md-col-10 lg-col-8 mx-auto">
				<div class="clearfix">
					<div class="col col-12 sm-col-6">
						<h1 class="light mt3"><?php the_title(); ?></h1>
					</div>
					<div class="col col-12 sm-col-6">
						<p class="preamble light mt3"><?php echo get_field('excerpt'); ?></p>
					</div>
					<div class="page-header__img-container col-12">
						<picture>
		                    <source media="(min-width: 40em)"
		                        data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
		                    <source
		                        data-srcset="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
		                    <img class="page-header__img"
		                            data-src="<?php echo get_field("cover_image")["sizes"]["vh_large"] ?>" 
		                            alt="<?php echo get_field("cover_image")["alt"] ?>"  
		                    />
		                </picture>
	                </div>
				</div>
			</div>
		</div>
	    <div class="col-11 md-col-10 lg-col-8 mx-auto">
	    	<div class="clearfix">
	    		<div class="article-body col col-12 sm-col-9 md-col-9 page__body">
			    	<?php the_content(); ?>
			    </div>
			    <div class="col col-12 sm-col-3 md-col-3 page__sidebar">
	    			<address class="author-horizontal mt4 mb4">
	                    <div class="author-horizontal__img-container">
	                        <img 
	                            data-src="<?php echo get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"]; ?>" 
	                            alt="'Skrivet av: ' + <?php the_author_meta('display_name'); ?>" 
	                            class="author-horizontal__img"
	                        />
	                    </div>
	                    <div class="author-horizontal__bio">
	                    	<span class="block author-horizontal__name"><?php the_author_meta('display_name'); ?></span>
	                    	<span class="block author-horizontal__title"><?php echo get_field('role', 'user_'. $author_id); ?></span>
	                    </div>
	                </address>
	    		</div>
	    	</div>
	    </div>	
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>