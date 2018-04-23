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
	<div class="article-body mt3">
		<?php //the_content(); ?>
	</div>
	<section class="clearfix mb3">
        <section class="mt4 col col-6">
            <span class="google-details__section-label mb2 block">
            	<?php _e('Hitta hit', 'visithalland') ?>
            </span>
            <a href="http://www.google.com/maps/place/<?php echo get_field("location")['lat'] . "," . get_field("location")['lng'] ?>" class="btn inline-block">
                <svg class="icon btn__icon">
                    <use xlink:href="#pin-icon"/>
                </svg>
                <?php _e( 'Visa på karta', 'visithalland' ) ?>
            </a>
        </section>

        <?php if(get_field("external_link")) : ?>
            <section class="mt4 col col-6">
	            <span class="google-details__section-label mb2 block ">
	            	<?php _e( 'Läs mer', 'visithalland' )?>
	            </span>
	            <a href="<?php echo get_field("external_link") ?>" class="btn btn--primary inline-block">
	            	<?php _e('Gå till webbplats', 'visithalland') ?>
	            </a>
            </section>
        <?php endif ?>
    </section>
</article>

<?php include('footer.php'); ?>