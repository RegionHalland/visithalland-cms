
@extends('layouts.app')

@section('content')
    @php
        global $wp_query;
        $total_results = $wp_query->found_posts;
    @endphp

    {{ get_search_form() }}

    @if(isset($post))
    <article role="main" id="main-content">
	        <div class="container w-11/12  md:w-10/12  lg:w-10/12  mx-auto">
	        	@if(isset($wp_query))

	        	<header class="bg-blue font-rift text-sm font-bold px-3 py-2 mb-3 mt-6 rounded-full inline-block text-white">
		            @php _e( 'Dina sökresultat', 'visithalland' ) @endphp
		        </header>

	        	<div class="search-inner flex flex-wrap -mx-2 mb-4">
			            @foreach ($wp_query->posts as $key => $post)
			            	@php
				            	$post_id = $post->ID;
								$thumbnail_id = get_post_thumbnail_id($post_id);
								$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
								$terms = get_the_terms($post_id, 'experience');

								// TODO: Add a secure way of adding slug-classes to search results
							@endphp
			            	<div class="w-full sm:w-6/12 lg:w-4/12 search-result px-2 mt-4">
						        <a href="{{ the_permalink($post->ID) }}" title="{{ the_permalink($post->ID) }}">
										<article class="image-blurb {{ $terms[0]->slug }}">
											<picture>
												<source
													media="(min-width: 40em)"
													data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_large@2x' ) . " 2x" }}" />
												<source
													data-srcset="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($post_id, 'vh_medium@2x' ) . " 2x" }}" />
												<img
													class="image-blurb__img  max-w-none lazyload"
													data-src="{{ get_the_post_thumbnail_url($post_id, 'vh_medium' )}}"
													alt="{{ $alt }}" />
											</picture>
											<div class="image-blurb__content">
												<h3 class="image-blurb__title">{{ $post->post_title}}</h3>
												<div class="read-more my-3">
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
    @endif

@endsection
