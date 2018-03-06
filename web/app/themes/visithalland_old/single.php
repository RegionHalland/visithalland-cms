<?php get_header(); ?>

<h1><?php the_title(); ?></h1>
<?php the_field("body"); ?>
<img src="<?php echo get_field("cover_image")["url"]; ?>">
<?php get_footer(); ?>