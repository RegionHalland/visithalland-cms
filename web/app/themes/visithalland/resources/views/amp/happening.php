<?php include('header.php'); ?>

<?php while( have_posts() ) : the_post(); 
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
?>
	<article class="container <?php App::getTermClassName() ?>" role="main" id="main-content"  data-posttype="<?php get_post_type()?>">
		<section class="article-hero relative clearfix <?php App::getTermClassName() ?>" role="heading" id="page-content">
		    <div class="article-hero__backdrop topographic-pattern">
		    </div>
		    <div class="article-hero__inner relative col-11 md-col-10 lg-col-10 mx-auto">
		        <div class="article-hero__img-container topographic-pattern">
		            
		            <?php if(get_field("start_date")) : ?>
		                <div class="date-badge absolute top-0 left-0 ml2 mt2 z3">
		                    <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date"))); ?></span>
		                    <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date"))); ?></span>
		                </div>
		            <?php endif ?>
		                
	                <amp-img class="article-hero__img"
	                    data-src="<?php echo get_the_post_thumbnail_url( $post->ID, 'vh_hero_wide' ) ?>"
	                    alt="<?php echo $alt ?>"
	                />
		            
		            <?php if(isset($thumbnail_image) && is_array($thumbnail_image) && $thumbnail_image[0]->post_content) : ?>
		                <figcaption class="image-credit--large absolute top-0 right-0 mr2 mt2 z3">
		                    <svg class="icon image-credit--large__icon">
		                        <use xlink:href="#camera-icon"/>
		                    </svg>
		                    <span class="image-credit--large__author"><?php echo $thumbnail_image[0]->post_content ?></span>
		                </figcaption>
		            <?php endif ?>

		            <div class="article-hero__content col-11 md-col-10">
		                <h1 class="article-hero__title light h1 mb3 center mt2"><?php the_title() ?></h1>
		            </div>
		        </div>
		        <div class="scroll-indicator mx-auto left-0 right-0">
		            <svg class="scroll-indicator__icon">
		                <use xlink:href="#arrow-down-icon"/>
		            </svg>
		        </div>
		    </div>
		</section>
        <div class="clearfix mt4 mb5">
            <div class="col-11 mx-auto clearfix">
                <div class="happening__content col col-12 mt2">
                    <p class="preamble"><?php echo get_field("excerpt") ?></p>
                </div>
                <aside class="col col-12">
                    <div class="happening-info topographic-pattern">
                        <div class="happening-info__map acf-map">
                            <div class="marker" data-lat="<?php echo get_field("location")['lat']?>" data-lng="<?php echo get_field("location")['lng']?>"></div>
                        </div>
                        <div class="happening-info__inner clearfix">
                            <section class="happening-info__section col col-12 sm-col-4">
                                <span class="happening-info__section-label"><?php _e( 'Datum', 'visithalland' ) ?></span>
                                <span class="happening-info__date light">
                                    <span><?php echo $dateobj = date("j", strtotime(get_field("start_date"))) ?></span>
                                    <span><?php echo $dateobj = date("M", strtotime(get_field("start_date"))) ?></span>
                                </span>
                            </section>
                            <section class="happening-info__section col col-12 sm-col-4">
                                <span class="happening-info__section-label"><?php _e( 'Plats', 'visithalland' ) ?></span>
                                <a href="http://www.google.com/maps/place/<?php get_field("location")['lat'] . "," . get_field("location")['lng'] ?>" class="happening-info__a inline-block">
                                    <svg class="icon happening-info__icon">
                                        <use xlink:href="#pin-icon"/>
                                    </svg>
                                    <?php _e( 'Hitta hit', 'visithalland' ) ?>
                                </a>
                            </section>
                            <section class="happening-info__section col col-12 sm-col-4">
                                <a href="<?php get_field("external_links") ?>" class="btn btn--primary inline-block"><?php _e( 'Mer information', 'visithalland' ) ?></a>
                            </section>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </article>
    <?php endwhile ?>
</div>

<?php include('footer.php'); ?>
