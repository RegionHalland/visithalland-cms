@php $featured_posts = get_field('featured', $term); @endphp

@if(isset($featured_posts))
    
	<section class="mt5 col-11 md-col-10 lg-col-10 mx-auto beach-coast">
		<div class="featured-grid clearfix">
		    @foreach ($featured_posts as $post)
		        <?php setup_postdata($post); 
		        	$post_id = $post->ID; 
					$thumbnail_id = get_post_thumbnail_id($post_id);
					$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
				?>
				{{-- Gets first item in array --}}
				@if($loop->iteration == 1) 
					<div class="featured-grid__item featured-grid__item--large col col-12 sm-col-12 lg-col-8">
						<a href="{{ the_permalink($post->ID) }}">
							<article class="image-blurb">
								<picture>
									<source 
										media="(min-width: 40em)"
										data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_large@2x' ) . " 2x" }}" />
									<source 
										data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium@2x' ) . " 2x" }}" />
									<img 
										class="image-blurb__img lazyload" 
										data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' )}}"
										alt="{{ $alt }}" />
								</picture>
								<div class="image-blurb__content">
									<h2 class="image-blurb__title">{!! $post->post_title !!}</h2>
									<div class="read-more my3">
					                    <span class="read-more__text light">
					                        @php _e( 'Läs mer', 'visithalland' ); @endphp
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
					</div>
				
				{{-- Gets second and third item in array --}}
				@elseif($loop->iteration > 1 && $loop->iteration <= 3)
					<div class="featured-grid__item featured-grid__item--medium col col-12 sm-col-6 lg-col-4">
						<a href="{{ the_permalink($post->ID) }}">
							<article class="image-blurb">
								<picture>
									<source 
										media="(min-width: 40em)"
										data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_large@2x' ) . " 2x" }}" />
									<source 
										data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium@2x' ) . " 2x" }}" />
									<img 
										class="image-blurb__img lazyload" 
										data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' )}}"
										alt="{{ $alt }}" />
								</picture>
								<div class="image-blurb__content">
									<h3 class="image-blurb__title">{!! $post->post_title !!}</h3>
									<div class="read-more my3">
					                    <span class="read-more__text light">
					                        @php _e( 'Läs mer', 'visithalland' ); @endphp
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
					</div>
				
				{{-- Loops remaining items as small --}}
				@else
					<div class="featured-grid__item featured-grid__item--small col col-12 sm-col-6 lg-col-4">
						<a href="{{ the_permalink($post->ID) }}">
							<article class="image-blurb">
								<picture>
									<source 
										media="(min-width: 40em)"
										data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_large@2x' ) . " 2x" }}" />
									<source 
										data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium@2x' ) . " 2x" }}" />
									<img 
										class="image-blurb__img lazyload" 
										data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' )}}"
										alt="{{ $alt }}" />
								</picture>
								<div class="image-blurb__content">
									<h3 class="image-blurb__title">{!! $post->post_title !!}</h3>
									<div class="read-more my3">
					                    <span class="read-more__text light">
					                        @php _e( 'Läs mer', 'visithalland' ); @endphp
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
					</div>
				@endif
		    @endforeach
		</div>
	</section>

    <?php wp_reset_postdata(); ?>

@endif


		


