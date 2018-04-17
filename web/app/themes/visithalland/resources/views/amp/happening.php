<?php include('header.php'); ?>

<?php while( have_posts() ) : the_post();
	$post_id = get_the_ID();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
endwhile;
?>

<?php include('article-hero.php'); ?>

<p class="preamble col-11 mx-auto mt4"><?php echo get_field('excerpt'); ?></p>
<div class="article-body col-11 mx-auto mt3">
	<?php the_content(); ?>
</div>

<?php include('footer.php'); ?>
