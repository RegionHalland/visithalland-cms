<?php get_header(); ?>

<article class="container" role="main" id="main-content">
<div class={"article-content clearfix " + this.props.breadcrumbs[0].slug}>
    <div class="col-12 md-col-10 lg-col-8 mx-auto">
    	<article class="article-body">
    		<?php while ( have_posts() ) : the_post(); ?>
    			<?php the_field("body") ?>
			<?php endwhile; ?>
        </article>


        <div class="article-mentions mt2 clearfix">
	        <div class="article-mentions__header">
	            <h3>Restips från artikeln</h3>
	        </div>

				<article class={"article-mention " + this.props.taxonomy_slug}>
                <NavLink class="link-reset" routeName={routeNames[this.props.post_type]} navParams={{conceptName: this.props.taxonomy_slug, postSlug: this.props.post_name}}>
                    <div class="clearfix">
                        <div class="col col-5 sm-col-4 ">
                            <div class="article-mention__img-container relative">
                            	<img class="article-mention__img" src="<?php echo get_field("cover_image")['url']; ?>" alt="TODO" />
                            </div>
                        </div>
                        <?php
                        	$mentions = get_field("mentioned");
                        	$furtherReading = get_field("mentioned");
                       	    foreach ($mentions as $key => $value): ?>
							<div class="article-mention__content col col-7 sm-col-8">
	                            <h5 class="article-mention__label"><?php echo $value->post_title ?></h5>
	                            <h4 class="article-mention__title"><?php echo $value->post_title ?></h4>
	                            <div class="article-link inline-block mt2">
	                                <span class="article-link__text">Läs mer</span>
	                                <span class="article-link__icon-wrapper">
	                                    <i class="material-icons article-link__icon">arrow_forward</i>
	                                </span>
	                            </div>
	                        </div>
                       	<?php endforeach ?>
                    </div>
                </NavLink>
            </article>
        </div>

    </div>
</div>
{ this.props.furtherReading ?
    <ArticleFurtherReadings furtherReadings={this.props.furtherReading ? this.props.furtherReading :  []} />
    : null
}
</article>

<?php get_footer(); ?>