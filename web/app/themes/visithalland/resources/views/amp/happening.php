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

<div class="happening-info col-11 mx-auto mt4 p3">
    <section class="happening-info__section mb4">
        <span class="happening-info__section-label"><?php _e( 'Datum', 'visithalland' ) ?></span>
        <span class="happening-info__date mt2 block light">
            <span><?php echo $dateobj = date("j", strtotime(get_field("start_date"))) ?></span>
            <span><?php echo $dateobj = date("M", strtotime(get_field("start_date"))) ?></span>
        </span>
    </section>
    <section class="happening-info__section mb4">
        <span class="happening-info__section-label"><?php _e( 'Plats', 'visithalland' ); ?></span>
        <a href="http://www.google.com/maps/place/<?php echo get_field("location")['lat'] . "," . get_field("location")['lng'] ?>" class="happening-info__a mt2 inline-block">
            <svg class="icon happening-info__icon">
                <use xlink:href="#pin-icon"/>
            </svg>
            <?php _e( 'Hitta hit', 'visithalland' ); ?>
        </a>
    </section>
    <section class="happening-info__section">
    	<span class="happening-info__section-label"><?php _e( 'Hitta hit', 'visithalland' ); ?></span>
        <?php if(get_field("external_link")) : ?>
            <a href="<?php echo get_field("external_link") ?>" class="btn btn--primary inline-block mt2">
            	<?php _e('Gå till webbplats', 'visithalland'); ?>
            </a>
        <?php endif ?>
    </section>
</div>

<?php include('footer.php'); ?>
