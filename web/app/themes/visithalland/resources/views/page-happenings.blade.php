{{--
  Template Name: Happening Page
--}}

@extends('layouts.app')

@section('content')


		@include('partials.page.page-header')

		<div class="container col-11 md-col-10 lg-col-10 mx-auto pt2 pb4">
			@php $happenings = App::getHappenings(100) @endphp
			<div class="pb4 pt3 clearfix mxn2">
			    @if(is_array($happenings))
			        @foreach($happenings as $key => $happening)
			            	@php
				            	$post_id = $happening->ID;
								$thumbnail_id = get_post_thumbnail_id($post_id);
								$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
							@endphp
			            	<div class="col col-12 sm-col-4 px2 mt3">
						        <a href="{{ the_permalink($post_id) }}" title="{{ the_permalink($post_id) }}">
									<article class="image-blurb image-blurb--fixed-height {{ $happening->terms["terms_default_lang"]->slug }}">

									<div class="date-badge absolute top-0 left-0 mt2 ml2 z3">
									    <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date", $post_id))) }}</span>
									    <span class="date-badge__month">{{$dateobj = date("M", strtotime(get_field("start_date", $post_id))) }}</span>
									</div>
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
											<h3 class="image-blurb__title">{{ $happening->post_title}}</h3>
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
			    @endif
		    </div>
		</div>
@endsection
