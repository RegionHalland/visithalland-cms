@if(isset($week))

<section class="st-week overflow-hidden">
	<header class="st-week-header">
		<div class="container w-11/12  md:w-10/12  lg:w-10/12  mx-auto relative">
			<div class="clearfix flex flex-wrap">
				<div class="st-timeline col w-full sm:w-2/12">
					<div class="st-timeline__badge">
						<div class="date-badge flex items-center justify-center">
							@php
								$dateStart = new DateTime($week['date_start']);
								$dateEnd = new DateTime($week['date_end']);
							@endphp
							<div class="inline-block">
						    	<span class="date-badge__day">{{ $dateStart->format('d') }}</span>
						    	<span class="date-badge__month">{{ $dateStart->format('M') }}</span>
							</div>
							<div class="inline-block px-1">-</div>
							<div class="inline-block">
						    	<span class="date-badge__day">{{ $dateEnd->format('d') }}</span>
						    	<span class="date-badge__month">{{ $dateEnd->format('M') }}</span>
						    </div>
						</div>
					</div>
					<div class="st-timeline__line first"></div>
				</div>
				<div class="st-week-header__content  col w-full sm:w-8/12  lg:w-7/12 ">
					<h2 class="st-week-header__title mb-4">{{ $week['title'] }}</h2>
					<p class="st-week-header__description mb-3">{{ $week['description'] }}</p>
				</div>
			</div>
		</div>
	</header>
		<div class="container w-11/12  md:w-10/12  lg:w-10/12  mx-auto relative">
			<div class="clearfix flex flex-wrap">
				<div class="st-timeline col w-full sm:w-2/12">
					<div class="st-timeline__line"></div>
				</div>
				<div class="col w-full sm:w-10/12  lg:w-9/12  mb-4 st-week-grid">
					@foreach ($week['content'] as $content)
						
						{{-- POST --}}
						@if ($content['acf_fc_layout'] === 'post' && $content['fullsize'] != true)
						
						<div class="st-week-grid__item col w-full sm:w-6/12  mb-4">
							<a href="{{ get_permalink($content['post']->ID) }}" title="{{ $content['post']->post_title }}" class="link-reset">
	                            <article class="article relative {{ App::getTermClassName() }}">
	                                    <div class="article__img-container relative topographic-pattern">
	                                        @if (get_field("start_date", $content['post']->ID))
		                                        <div class="date-badge absolute pin-t pin-l z-40 mt-2 ml-2">
					                                <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date", $content['post']->ID))) }}</span>
					                                <span class="date-badge__month">{{ $dateobj = date("M", strtotime(get_field("start_date", $content['post']->ID))) }}</span>
					                            </div>
				                            @else
					                            <div class="article-tag mt-2 ml-2 absolute z-30 pin-l pin-t">
		                                            <div class="article-tag__icon-wrapper">
		                                                <div class="article-tag__icon"></div>
		                                            </div>
		                                        </div>
				                            @endif
	                                        @php
	                                            $thumbnail_id = get_post_thumbnail_id( $content['post']->ID );
	                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	                                        @endphp
	                                        <picture>
	                                            <source
	                                                data-srcset="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium@2x' ) . " 2x" }}" />
	                                            <img class="article__img lazyload"
	                                                data-src="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) }}"
	                                                alt="{{ $alt }}"
	                                            />
	                                        </picture>
	                                    </div>
	                                    <div class="article__content {{ App::getTermClassName() }}">
	                                        <h3 class="article__title mb-1 mt-1 pt0">{{ $content['post']->post_title }}</h3>
	                                        <p class="article__excerpt fade-text mt-2">@php the_field("excerpt", $content['post']->ID) @endphp</p>
	                                        <div class="read-more my3">
	                                            <span class="read-more__text">
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
						{{-- POST [END] --}}

						{{-- POST FULLSIZE --}}
						@if ($content['acf_fc_layout'] === 'post' && $content['fullsize'] === true)
						<div class="st-week-grid__item col w-full mb-4">
							<a href="{{ get_permalink($content['post']->ID) }}" title="{{ $content['post']->post_title }}" class="link-reset">
	                            <article class="article relative {{ App::getTermClassName() }}">
	                            	<div class=" -mx-2">
		                            	<div class="col w-full sm:w-6/12  px-2">
		                                    <div class="article__img-container relative topographic-pattern">
		                                        @if (get_field("start_date", $content['post']->ID))
			                                        <div class="date-badge absolute pin-t pin-l z-40 mt-2 ml-2">
						                                <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date", $content['post']->ID))) }}</span>
						                                <span class="date-badge__month">{{ $dateobj = date("M", strtotime(get_field("start_date", $content['post']->ID))) }}</span>
						                            </div>
					                            @else
						                            <div class="article-tag mt-2 ml-2 absolute z-30 pin-l pin-t">
			                                            <div class="article-tag__icon-wrapper">
			                                                <div class="article-tag__icon"></div>
			                                            </div>
			                                        </div>
					                            @endif
		                                        @php
		                                            $thumbnail_id = get_post_thumbnail_id( $content['post']->ID );
		                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
		                                        @endphp
		                                        <picture>
		                                            <source
		                                                data-srcset="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium@2x' ) . " 2x" }}" />
		                                            <img class="article__img lazyload"
		                                                data-src="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) }}"
		                                                alt="{{ $alt }}"
		                                            />
		                                        </picture>
		                                    </div>
		                                </div>
		                                <div class="col w-full sm:w-6/12  px-2">
		                                    <div class="article__content {{ App::getTermClassName() }}">
		                                        <h3 class="article__title mb-1 mt-1 pt0">{{ $content['post']->post_title }}</h3>
		                                        <p class="article__excerpt fade-text mt-2">@php the_field("excerpt", $content['post']->ID) @endphp</p>
		                                        <div class="read-more my3">
		                                            <span class="read-more__text">
		                                                @php _e( 'Läs mer', 'visithalland' ); @endphp
		                                            </span>
		                                            <div class="read-more__button">
		                                                <svg class="icon read-more__icon">
		                                                    <use xlink:href="#arrow-right-icon"/>
		                                                </svg>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
	                                </div>
	                            </article>
	                        </a>
						</div>
						@endif
						{{-- POST FULLSIZE [END]--}}

						{{-- LINK --}}
						@if ($content['acf_fc_layout'] === 'link' && $content['fullsize'] != true)
						<div class="st-week-grid__item col w-full {{ $content['fullsize'] === true ? '' : 'sm:w-6/12 ' }} mb-4">
						    <a href="{{ $content['url'] }}" title="{{ $content['title']}}" class="link-reset">
						        <article class="article relative {{ App::getTermClassName() }}">
						                <div class="article__img-container relative topographic-pattern">
						                    <div class="article-tag mt-2 ml-2 absolute z-30 pin-l pin-t">
						                        <div class="article-tag__icon-wrapper">
						                            <div class="article-tag__icon"></div>
						                        </div>
						                    </div>
						                    @php
						                        $thumbnail_id = get_post_thumbnail_id( $content['image']['ID'] );
						                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
						                    @endphp
						                    <picture>
						                        <source
						                            data-srcset="{{ $content['image']['sizes']['vh_medium'] . " 1x," . $content['image']['sizes']['vh_medium@2x'] . " 2x" }}" />
						                        <img class="article__img lazyload"
						                            data-src="{{ $content['image']['sizes']['vh_medium'] }}"
						                            alt="{{ get_field("cover_image")["alt"] }}"
						                        />
						                    </picture>
						                </div>
						                <div class="article__content {{ App::getTermClassName() }}">
						                    <h3 class="article__title mb-1 mt-1 pt0">{{ $content['title'] }}</h3>
						                    <p class="article__excerpt fade-text mt-2">{{ $content['description'] }}</p>
						                    <div class="read-more my3">
						                        <span class="read-more__text">
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
						{{-- LINK [END] --}}

						{{-- LINK FULLSIZE --}}
						@if ($content['acf_fc_layout'] === 'link' && $content['fullsize'] === true)
						<div class="st-week-grid__item col w-full mb-4">
							<a href="{{ $content['url'] }}" title="{{ $content['title']}}" class="link-reset">
						        <article class="article relative {{ App::getTermClassName() }}">
						        	<div class=" -mx-2">
							        	<div class="col w-full sm:w-6/12  px-2">
							                <div class="article__img-container relative topographic-pattern">
							                    <div class="article-tag mt-2 ml-2 absolute z-30 pin-l pin-t">
							                        <div class="article-tag__icon-wrapper">
							                            <div class="article-tag__icon"></div>
							                        </div>
							                    </div>
							                    @php
							                        $thumbnail_id = get_post_thumbnail_id( $content['image']['ID'] );
							                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
							                    @endphp
							                    <picture>
							                        <source
							                            data-srcset="{{ $content['image']['sizes']['vh_medium'] . " 1x," . $content['image']['sizes']['vh_medium@2x'] . " 2x" }}" />
							                        <img class="article__img lazyload"
							                            data-src="{{ $content['image']['sizes']['vh_medium'] }}"
							                            alt="{{ get_field("cover_image")["alt"] }}"
							                        />
							                    </picture>
							                </div>
							            </div>
							            <div class="col w-full sm:w-6/12  px-2">
							                <div class="article__content {{ App::getTermClassName() }}">
							                    <h3 class="article__title mb-1 mt-1 pt0">{{ $content['title'] }}</h3>
							                    <p class="article__excerpt fade-text mt-2">{{ $content['description'] }}</p>
							                    <div class="read-more my3">
							                        <span class="read-more__text">
							                            @php _e( 'Läs mer', 'visithalland' ); @endphp
							                        </span>
							                        <div class="read-more__button">
							                            <svg class="icon read-more__icon">
							                                <use xlink:href="#arrow-right-icon"/>
							                            </svg>
							                        </div>
							                    </div>
							                </div>
							            </div>
						            </div>
						        </article>
						    </a>
						</div>
						@endif
						{{-- LINK FULLSIZE [END] --}}

						{{-- QUOTE --}}
						@if ($content['acf_fc_layout'] === 'quote')
						<div class="st-week-grid__item col w-full mb-4">
							<div class="st-week-quote">
								<div class="st-week-quote__img-container">
									<picture>
										<source
											data-srcset="{{ $content['image']['sizes']['vh_thumbnail@2x'] . " 1x," . $content['image']['sizes']['vh_medium_square'] . " 2x" }}" />
										<img class="lazyload"
											data-src="{{ $content['image']['sizes']['vh_thumbnail@2x'] }}"
											alt="{{ get_field("cover_image")["alt"] }}"
										/>
									</picture>
								</div>
								<div class="st-week-quote__content">
									<blockquote class="st-week-quote__quote">{{ $content['quote'] }}</blockquote>
									<p class="st-week-quote__quoted">– {{ $content['quoted'] }}</p>
								</div>
							</div>
						</div>
						@endif
						{{-- QUOTE [END] --}}


						{{-- CAROUSEL --}}
						@if ($content['acf_fc_layout'] === 'carousel')
						<div class="st-week-grid__item col w-full mb-4 py-4">
							<h2 class="st-week-carousel__title mb-3">{{ $content['description'] }}</h2>
							<div class="relative js-carousel-parent">
								<button class="st-week-carousel-previous js-carousel-previous icon-button">
									<svg class="icon--sm icon-button__icon">
										<use xlink:href="#arrow-left-icon"/>
									</svg>
								</button>
								<button class="st-week-carousel-next js-carousel-next icon-button">
									<svg class="icon--sm icon-button__icon">
										<use xlink:href="#arrow-right-icon"/>
									</svg>
								</button>
								<div class="st-week-carousel js-carousel">
									@foreach ($content['content'] as $item)
										<div class="col w-10/12  sm:w-8/12  md:w-5/12 mr-3">
											<a href="{{ the_permalink($item->ID) }}" title="{!! $item->post_title !!}">
												<article class="image-blurb image-blurb--fixed-height">
													@if (get_field("start_date", $item->ID))
				                                        <div class="date-badge visithalland absolute pin-t pin-l z-40 mt-2 ml-2">
							                                <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date", $item->ID))) }}</span>
							                                <span class="date-badge__month">{{ $dateobj = date("M", strtotime(get_field("start_date", $item->ID))) }}</span>
							                            </div>
						                            @endif
													<picture>
														<source
															media="(min-width: 40em)"
															data-srcset="{{ get_the_post_thumbnail_url($item->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url($item->ID, 'vh_large@2x' ) . " 2x" }}" />
														<source
															data-srcset="{{ get_the_post_thumbnail_url($item->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url($item->ID, 'vh_medium@2x' ) . " 2x" }}" />
														<img
															class="image-blurb__img lazyload"
															data-src="{{ get_the_post_thumbnail_url($item->ID, 'vh_medium' )}}"
															alt="{{ $alt }}" />
													</picture>
													<div class="image-blurb__content">
														<h3 class="image-blurb__title">{!! $item->post_title !!}</h3>
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
							</div>
						</div>
						@endif
						{{-- CAROUSEL [END] --}}

					@endforeach
				</div>
			</div>
		</div>
</section>
@endif