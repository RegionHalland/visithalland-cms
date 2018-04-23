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
		<?php //the_content(); ?>
	</div>

	<?php $spotlights = get_field("stops"); ?>
    <?php if(isset($spotlights) && is_array($spotlights)) : ?>
	    <?php foreach ($spotlights as $key => $spotlight) : ?>
	        <?php
	            $current_tip = $spotlight;
	            $thumbnail_id = get_post_thumbnail_id( $current_tip->ID );
	            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	        ?>
	        <a href="<?php the_permalink($current_tip->ID) ?>" title="<?php echo $current_tip->post_title ?>">
                <article class="image-blurb image-blurb--fixed-height mt2">
                    <div>
                        <amp-img class="image-blurb__img"
                            src="<?php echo get_the_post_thumbnail_url( $current_tip->ID, 'vh_medium_square' ) ?>"
                            height="300"
                            width="300"
                            alt="<?php echo $alt ?>"
                        />
                    </div>
                    <div class="image-blurb__content">
                        <h3 class="image-blurb__title"><?php echo $current_tip->post_title ?></h3>
                        <div class="read-more my3">
                            <span class="read-more__text light">
                                <?php _e( 'Läs mer', 'visithalland' ); ?>
                            </span>
                            <div class="read-more__button">
                                <svg class="icon read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </article>
            </a>
	    <?php endforeach ?>
	<?php endif?>
</article>

<?php include('footer.php'); ?>