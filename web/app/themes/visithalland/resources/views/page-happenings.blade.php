{{--
  Template Name: Happening Page
--}}

@extends('layouts.app')

@section('content')

{{-- @while ( have_posts() ) : the_post(); 
	
	@php
		$author_id = get_the_author_meta('ID');
		$term = get_queried_object();
	@endphp

	<article class="container relative" role="main" id="main-content">
		<div class="happening-page-header">
			<div class="happening-page-header__backdrop topographic-pattern">
			</div>
			<div class="happening-page-header__inner col-11 md-col-10 lg-col-8 mx-auto">
				<div class="clearfix">
					<div class="col col-12 sm-col-6">
						<h1 class="light mt3">{{ the_title() }}</h1>
					</div>
					<div class="col col-12 sm-col-6">
						<div class="preamble light mt3">{{ the_content() }}</div>
					</div>
	            </div>
			</div>
		</div>

		@php 
			$next = vh_get_happenings(1);
		@endphp

			@foreach($next as $index => $value)

			@if($index === 0)

				<article class="happening-large col-11 md-col-10 lg-col-8 mx-auto z3 relative mt4 {{ get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug }}">
					<a href="{{get_permalink($value->ID)}}" class="link-reset">
						<div class="happening-large__img-container">
							@php
					        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
								  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
							@endphp
							<picture>
		                        <source media="(min-width: 40em)"
		                            data-srcset="{{get_the_post_thumbnail_url( $value->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_large@2x' ) . " 2x" }}" />

		                        <source
		                            data-srcset="{{ get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" }}" />

		                        <img class="happening-large__img lazyload"
		                                data-src="{{  get_the_post_thumbnail_url( $value->ID, 'vh_large' ); }}" 
		                                alt="{{ $alt }}"  
		                        />
		                        
		                    </picture>
			            </div>
			            <div class="clearfix my4">
			            	<div class="col col-12 sm-col-6">
			            		<h2 class="happening-large__title">{{ $value->post_title }}</h2>
			            	</div>
			            	<div class="col col-12 sm-col-6">
			            		<p class="happening-large__excerpt">{{ the_field("excerpt", $value->ID) }}</p>
			            		<div class="col col-6">
			            			<div class="happening-large__info">
			            				<span class="happening-large__info-title block">
			            					@php _e( 'Datum', 'visithalland' ) @endphp
			            				</span>
			            				<span class="happening-large__date block">
			            					<span class="">{{ $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); }}</span>
											<span class="">{{ $dateobj = date("M", strtotime(get_field("start_date", $value->ID))); }}</span>
			            				</span>
			            			</div>
			            		</div>
			            		<div class="col col-6">
			            			<div class="happening-large__info">
			            				<span class="happening-large__info-title block">
			            					@php _e( 'Länk', 'visithalland' ) @endphp
			            				</span>
			            				<a 
			            					class="btn btn--primary inline-block coastal-living" 
			            					href="{{ get_field("external_links", $value->ID)[0]["link"]; }}" 
			            					class="btn btn--primary inline-block">
			            					@php _e( 'Mer information', 'visithalland' ) @endphp
			            				</a>
			            			</div>
			            		</div>
			            	</div>
			            </div>
		        	</a>
		        </article>


	        @endif

    	@endforeach

		@php /* Happening Grid Start */ @endphp
	    <div class="happening-page__grid col-11 md-col-10 lg-col-8 mx-auto my5">
	    	<div class="clearfix mt4 mxn2">

	    		@php $happenings = App::getHappenings() @endphp
    			@if(is_array($happenings))

	    			@foreach($happenings as $index => $value)


			    		<div class="happening-page__grid-item col col-12 sm-col-6 md-col-4 px2 mt3">
							<article class="happening-medium relative  {{get_term_for_default_lang(get_the_terms($value, "taxonomy_concept")[0], "taxonomy_concept")->slug}} ">
								<a href="{{get_permalink($value->ID)}}" class="link-reset">
									<div class="happening-medium__date z3">
										<div class="date-badge">
										    <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); }}</span>
										    <span class="date-badge__month">{{$dateobj = date("M", strtotime(get_field("start_date", $value->ID)));}}</span>
										</div>
			                        </div>
								    <div class="happening-medium__img-container topographic-pattern">
								    	@php 
								        	  $thumbnail_id = get_post_thumbnail_id( $value->ID );
											  $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
										@endphp
									    <picture>
					                        <source
					                            data-srcset="{{get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x"}}" />

					                        <img class="happening-medium__img lazyload z2"
					                                data-src="{{get_the_post_thumbnail_url( $value->ID, 'vh_medium' );}}" 
					                                alt="{{$alt}}"  
					                        />
					                        
					                    </picture>								    	
								    </div>
								    <div class="happening-medium__content mt2">
										<h3 class="happening-medium__title mb1 mt1 pt0">{{$value->post_title}}</h3>
								    </div>
								    <a class="link-reset" href="{{get_permalink($value->ID)}}">
			                            <div class="read-more">
									    	<span class="read-more__text">@php _e( 'Läs mer', 'visithalland' ) @endphp</span>
									    	<div class="read-more__button">
										    	<svg class="icon read-more__icon">
			                                    	<use xlink:href="#arrow-right-icon"/>
			                                	</svg>
		                                	</div>
									    </div>
								    </a>
								</a>
							</article>
			    		</div>
	    	 	@endforeach

	    	</div>
	    </div>	


	</article>
	@endwhile --}}
@endsection
