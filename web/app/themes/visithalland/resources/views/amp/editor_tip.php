<?php include('header.php'); ?>

<?php while( have_posts() ) : the_post();
	$post_id = get_the_ID();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    $author_id = get_the_author_meta('ID');
	endwhile;
?>

<?php include('article-hero.php'); ?>

<article class="article-content col-11 mx-auto">
	<p class="preamble mt4">
		<?php echo get_field('excerpt'); ?>
	</p>
	<?php include('author.php'); ?>
	<div class="article-body mt3">
		<?php the_content(); ?>
	</div>
	<?php include('mentions.php'); ?>
	
</article>

<?php include('footer.php'); ?>