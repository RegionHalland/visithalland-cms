<?php $mentions = get_field("mentioned"); ?>
	<?php if(isset($mentions) && is_array($mentions)) : ?>
	    <div class="article-mentions mt3 clearfix">
	         <header class="section-header inline-block mb2 coastal-living">
	            <div class="section-header__icon-wrapper">
	                <svg class="section-header__icon icon">
	                    <use xlink:href="#recommend-icon"/>
	                </svg>
	            </div>
	            <div class="section-header__title">
	                <?php _e( 'Tips från artikeln', 'visithalland' ) ?>
	            </div>
	        </header>
	        <?php foreach($mentions as $key => $mention) : ?>
	            <a href="<?php echo get_permalink($mention->ID) ?>" class="link-reset">
	                <article class="article-mention inline-flex items-center mt3">
                            <div class="article-mention__img-container relative">
                                <?php
                                    $thumbnail_id = get_post_thumbnail_id( $mention->ID );
                                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                                ?>
                                <amp-img class="article-mention__img"
                                    src="<?php echo get_the_post_thumbnail_url( $mention->ID, 'vh_thumbnail' ) ?>"
                                    height="100"
                                    width="100"
                                    alt="<?php echo $alt ?>"
                                />
                            </div>
	                        <div class="article-mention__content">
	                            <h4 class="article-mention__title">
	                                <?php if(get_field("title", $mention->ID) != '') : ?>
	                                    <?php the_field("title", $mention->ID) ?>
	                                <?php else : ?>
	                                    <?php echo $mention->post_title ?>
	                                <?php endif ?>
	                            </h4>
	                            <div class="read-more mt2">
	                                <span class="read-more__text">
	                                    <?php _e( 'Läs mer', 'visithalland' ) ?>
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
	    </div>
	<?php endif?>