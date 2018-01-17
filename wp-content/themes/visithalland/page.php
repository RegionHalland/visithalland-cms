<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<?php while ( have_posts() ) : the_post(); ?>
	<article class="container <?php echo vh_get_post_taxonomy()['slug']; ?>" role="main" id="main-content">
	    <div class="col-11 md-col-10 lg-col-8 mx-auto">
		    <div class="article-body">
		    	<?php get_field('body'); ?>
		    </div>
	    </div>	
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>