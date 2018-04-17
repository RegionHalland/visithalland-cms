@extends('layouts.app')

@section('content')
    @php
        global $wp_query;
        $total_results = $wp_query->found_posts;
    @endphp
	
    {{ get_search_form() }}
    <article role="main" id="main-content">
	        <div class="container col-11 md-col-10 lg-col-10 mx-auto">
	        	@if(isset($wp_query))
	        	<header class="section-header block mb2 mt4 coastal-living">
		            <div class="section-header__icon-wrapper">
		                <svg class="section-header__icon icon">
		                    <use xlink:href="#search-icon"/>
		                </svg>
		            </div>
		            <div class="section-header__title">
		                @php _e( 'Dina sökresultat', 'visithalland' ) @endphp
		            </div>
        		</header>
	        	<div class="search-inner clearfix mxn2 mb4">
			            @foreach ($wp_query->posts as $key => $post)
			            	@php
				            	$post_id = $post->ID;
								$thumbnail_id = get_post_thumbnail_id($post_id);
								$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
								$terms = get_the_terms($post_id, 'taxonomy_concept');

								// TODO: Add a secure way of adding slug-classes to search results
							@endphp
			            	<div class="col col-12 sm-col-4 search-result px2 mt3">
						        <a href="{{ the_permalink($post->ID) }}" title="{{ the_permalink($post->ID) }}">
										<article class="image-blurb {{ $terms[0]->slug }}">
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
												<h3 class="image-blurb__title">{{ $post->post_title}}</h3>
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
					    @endforeach
				</div>
				@endif
	    	</div>
	    @include('partials.recommended-articles')
	</article>

@endsection
