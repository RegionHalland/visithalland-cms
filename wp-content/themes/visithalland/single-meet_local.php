<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); 

    $author_id = get_the_author_meta('ID');
    
?>
	<article class="container <?php echo vh_get_post_taxonomy()['slug']; ?>" role="main" id="main-content">
	    <section class="meet-a-local-header">
	        <div class="meet-a-local-header__img-container topographic-pattern">
	            <picture>
	                <source media="(min-width: 40em)"
	                    srcSet="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] . " 1x," . get_field("cover_image")["sizes"]["vh_hero_wide@2x"] . " 2x" ?>" />
	                <source
	                    srcSet="<?php echo get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" ?>" />
	                <img class="meet-a-local-header__img" 
	                        src="<?php echo get_field("cover_image")["sizes"]["vh_hero_wide"] ?>" 
	                        alt="<?php echo get_field("cover_image")["alt"] ?>"  
	                />
	            </picture>
	        </div>
	        <div class="meet-a-local-header__inner col-12 md-col-10 lg-col-10 mx-auto">
	            <div class="meet-a-local-header__content center">
	                <div class="article-tag <?php echo vh_get_post_taxonomy()['slug']; ?>">
	                    <div class="article-tag__icon-wrapper">
	                        <div class="article-tag__icon"></div>
	                    </div><span class="article-tag__type"><?php echo vh_get_pretty_post_type_name($post->post_type) ?></span></div>
	                <h1 class="meet-a-local-header__title h1 mb3 center mt2"><?php the_title(); ?></h1>
	                <p class="meet-a-local-header__preamble center"<?php the_excerpt(); ?></p>
	                <address class="author-vertical center block mt4 mb4">
	                    <div class="author-vertical__img-container mx-auto">
	                        <img 
	                            src="<?php echo get_avatar_url($author_id); ?>" 
	                            alt="'Skrivet av: ' + <?php the_author_meta('display_name'); ?>" 
	                            class="author-vertical__img"
	                        />
	                    </div>
	                    <span class="block author-vertical__name"><?php the_author_meta('display_name'); ?></span>
	                    <span class="block author-vertical__title"><?php the_author_meta('description'); ?></span>
	                </address>
	            </div>
	        </div>
    	</section>
    	<div class="article-content clearfix">
	        <div class="col-12 md-col-10 lg-col-8 mx-auto">
	            <article class="article-body">
	            	<?php the_field("body") ?>
	            </article>
	        </div>
    	</div>
	    <section class="meet-a-local-tips clearfix">

    			<?php 

					if( have_rows('tips') ):

					    while( have_rows('tips') ) : the_row();

					        $value = get_sub_field('tip'); 

					        ?>
								<div class="tip col col-5">
		                            <div class="tip__img-container topographic-pattern">
		                                <picture>
							                <source media="(min-width: 40em)"
							                    srcSet="<?php echo get_field("cover_image", $value[0]->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value[0]->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
							                <source
							                    srcSet="<?php echo get_field("cover_image", $value[0]->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value[0]->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
							                <img class="meet-a-local-header__img" 
							                        src="<?php echo get_field("cover_image", $value[0]->ID)["sizes"]["vh_medium"] ?>" 
							                        alt="<?php echo get_field("cover_image", $value[0]->ID)["alt"] ?>"  
							                />
							            </picture>
		                            </div>
		                            <div class="tip__content inline-block">
		                                <h3 class="mt3 tip__title"><?php echo $value[0]->post_title ?></h3>
		                                <p class="my3 tip__quote"><?php the_sub_field('quote', $value->ID)?></p>
		                                <div class="tip__links">
		                                    <a class="tip__btn btn btn--primary link-reset" href="<?php echo get_field("cover_image", $value[0]->ID)["sizes"]["vh_medium@2x"]; ?>">
		                                        Läs mer om <?php echo $value[0]->post_title ?>
		                                    </a>
		                                    <div class="tip__btn btn btn--dark">Visa på karta</div>
		                                </div>
		                            </div>
		                        </div>

					    <?php endwhile;

					endif;
					?>
 
        </section>
	    </div>
	    <div class="featured-articles col-12 md-col-10 lg-col-12 mx-auto">   
		        <div class="clearfix">  
		            <?php
		                $featuredArticles = vh_get_posts_by_taxonomy_concept($post->ID);
		                foreach ($featuredArticles as $key => $value): ?>
		                    <article class="article-medium col col-4 <?php echo vh_get_post_taxonomy()["slug"] ?>">
		                        <a href="<?php echo $value->guid ?>" class="link-reset">
		                            <div class="article-medium__img-container topographic-pattern">
		                                <picture>
		                                    <source media="(min-width: 40em)"
		                                        srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_large"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_large@2x"] . " 2x" ?>" />
		                                    <source
		                                        srcSet="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_medium"] . " 1x," . get_field("cover_image", $value->ID)["sizes"]["vh_medium@2x"] . " 2x" ?>" />
		                                    <img class="concept-header__img" src="<?php echo get_field("cover_image", $value->ID)["sizes"]["vh_hero_wide"] ?>" alt="<?php echo get_field("cover_image", $value->ID)["alt"] ?>" />
		                                </picture>
		                            </div>
		                            <div class="article-medium__content">
		                                <div class="article-tag mt3 mb2">
		                                    <div class="article-tag__icon-wrapper">
		                                        <div class="article-tag__icon"></div>
		                                    </div>
		                                    <span class="article-tag__type">
		                                        <?php echo vh_get_pretty_post_type_name($value->post_type); ?>
		                                    </span>
		                                </div>
		                                
		                                <h3 class="mb1 mt1 pt0"><?php echo $value->post_title ?></h3>
		                                <p class="mt2"><?php echo get_field("excerpt", $value->ID) ?></p>
		                            </div>
		                        </a>
		                    </article>
		            <?php endforeach ?>
		        </div>
		    </div>
	</article>
<?php endwhile; ?>

<?php get_footer(); ?>