<?php get_header(); ?>

<?php echo the_post_thumbnail_url(); ?>

<main role="main" class="container" id="main-content">
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
</main>

<?php get_footer(); ?>