<section class="article-hero relative clearfix <?php App::getTermClassName() ?>" role="heading" id="page-content">
    <div class="article-hero__backdrop topographic-pattern">
    </div>
    <div class="article-hero__inner container relative col-11 md-col-10 lg-col-10 mx-auto">
        <div class="article-hero__img-container topographic-pattern">
            <?php if(get_field("start_date")) : ?>
                <div class="date-badge absolute top-0 left-0 ml2 mt2 z3">
                    <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date"))); ?></span>
                    <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date"))); ?></span>
                </div>
            <?php endif ?>
            <div>
                <amp-img
                    class="article-hero__img"
                    src="<?php echo get_the_post_thumbnail_url( $post_id, 'vh_medium_square' ) ?>"
                    alt="<?php $alt ?>"
                    width="1"
                    height="1"
                    layout="responsive">
            </div>
            <?php if(isset($thumbnail_image) && is_array($thumbnail_image) && $thumbnail_image[0]->post_content) : ?>
                <figcaption class="image-credit--large absolute top-0 right-0 mr2 mt2 z3">
                    <svg class="icon image-credit--large__icon">
                        <use xlink:href="#camera-icon"/>
                    </svg>
                    <span class="image-credit--large__author"><?php echo $thumbnail_image[0]->post_content ?></span>
                </figcaption>
            <?php endif ?>

            <div class="article-hero__content left-0 right-0 mx-auto mb4 bottom-0 center col-11 md-col-10">
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