@if(isset($week))

<div class="st-week">
	<header class="st-week-header">
		<div class="container col-11 md-col-10 lg-col-10 mx-auto relative">
			<div class="clearfix flex flex-wrap">
				<div class="st-timeline col col-12 sm-col-2">
					<div class="st-timeline__badge">
						<div class="date-badge">
							@php
								$dateStart = new DateTime($week['date_start']);
								$dateEnd = new DateTime($week['date_end']);
							@endphp
						    <span class="date-badge__day">{{ $dateStart->format('d') }}-{{ $dateEnd->format('d') }}</span>
						    <span class="date-badge__month">{{ $dateEnd->format('M') }}</span>
						</div>
					</div>
					<div class="st-timeline__line first"></div>
				</div>
				<div class="st-week-header__content  col col-12 sm-col-5">
					<h2 class="st-week-header__title mb4">{{ $week['title'] }}</h2>
					<p class="st-week-header__description mb3">{{ $week['description'] }}</p>
				</div>
			</div>
		</div>
	</header>
	<div>
		<div class="container col-11 md-col-10 lg-col-10 mx-auto relative">
			<div class="clearfix flex flex-wrap">
				<div class="st-timeline col col-12 sm-col-2">
					<div class="st-timeline__line"></div>
				</div>
				<div class="col col-12 sm-col-10 mb4 st-week-grid">
					@foreach ($week['content'] as $content)
						
						{{-- POST --}}
						@if ($content['acf_fc_layout'] === 'post' && $content['fullsize'] != true)
						
						<div class="st-week-grid__item col col-12 sm-col-6 mb5">
							<a href="{{ get_permalink($content['post']->ID) }}" title="{{ $content['post']->post_title }}" class="link-reset">
	                            <article class="article-medium relative {{ App::getTermClassName() }}">
	                                    <div class="article-medium__img-container relative topographic-pattern">
	                                        <div class="article-tag mt2 ml2 absolute z3 left-0 top-0">
	                                            <div class="article-tag__icon-wrapper">
	                                                <div class="article-tag__icon"></div>
	                                            </div>
	                                        </div>
	                                        @php
	                                            $thumbnail_id = get_post_thumbnail_id( $content['post']->ID );
	                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	                                        @endphp
	                                        <picture>
	                                            <source
	                                                data-srcset="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium@2x' ) . " 2x" }}" />
	                                            <img class="article-medium__img lazyload"
	                                                data-src="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) }}"
	                                                alt="{{ $alt }}"
	                                            />
	                                        </picture>
	                                    </div>
	                                    <div class="article-medium__content mt3 {{ App::getTermClassName() }}">
	                                        <h3 class="article-medium__title mb1 mt1 pt0">{{ $content['post']->post_title }}</h3>
	                                        <p class="article-medium__excerpt mt2">@php the_field("excerpt", $content['post']->ID) @endphp</p>
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
						<div class="st-week-grid__item col col-12 mb5">
							<a href="{{ get_permalink($content['post']->ID) }}" title="{{ $content['post']->post_title }}" class="link-reset">
	                            <article class="article-medium relative mxn3 {{ App::getTermClassName() }}">
	                            	<div class="col col-12 sm-col-6 px3">
	                                    <div class="article-medium__img-container relative topographic-pattern">
	                                        <div class="article-tag mt2 ml2 absolute z3 left-0 top-0">
	                                            <div class="article-tag__icon-wrapper">
	                                                <div class="article-tag__icon"></div>
	                                            </div>
	                                        </div>
	                                        @php
	                                            $thumbnail_id = get_post_thumbnail_id( $content['post']->ID );
	                                            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	                                        @endphp
	                                        <picture>
	                                            <source
	                                                data-srcset="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium@2x' ) . " 2x" }}" />
	                                            <img class="article-medium__img lazyload"
	                                                data-src="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_medium' ) }}"
	                                                alt="{{ $alt }}"
	                                            />
	                                        </picture>
	                                    </div>
	                                </div>
	                                <div class="col col-12 sm-col-6 px3">
	                                    <div class="article-medium__content mt3 {{ App::getTermClassName() }}">
	                                        <h3 class="article-medium__title mb1 mt1 pt0">{{ $content['post']->post_title }}</h3>
	                                        <p class="article-medium__excerpt mt2">@php the_field("excerpt", $content['post']->ID) @endphp</p>
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
	                            </article>
	                        </a>
						</div>
						@endif
						{{-- POST FULLSIZE [END]--}}

						{{-- LINK --}}
						@if ($content['acf_fc_layout'] === 'link' && $content['fullsize'] != true)
						<div class="st-week-grid__item col col-12 {{ $content['fullsize'] === true ? '' : 'sm-col-6' }} mb5">
						    <a href="{{ $content['url'] }}" title="{{ $content['title']}}" class="link-reset">
						        <article class="article-medium relative {{ App::getTermClassName() }}">
						                <div class="article-medium__img-container relative topographic-pattern">
						                    <div class="article-tag mt2 ml2 absolute z3 left-0 top-0">
						                        <div class="article-tag__icon-wrapper">
						                            <div class="article-tag__icon"></div>
						                        </div>
						                    </div>
						                    @php
						                        $thumbnail_id = get_post_thumbnail_id( $content['post']->ID );
						                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
						                    @endphp
						                    <picture>
						                        <source
						                            data-srcset="{{ $content['image']['sizes']['vh_medium'] . " 1x," . $content['image']['sizes']['vh_medium@2x'] . " 2x" }}" />
						                        <img class="article-medium__img lazyload"
						                            data-src="{{ $content['image']['sizes']['vh_medium'] }}"
						                            alt="{{ get_field("cover_image")["alt"] }}"
						                        />
						                    </picture>
						                </div>
						                <div class="article-medium__content mt3 {{ App::getTermClassName() }}">
						                    <h3 class="article-medium__title mb1 mt1 pt0">{{ $content['title'] }}</h3>
						                    <p class="article-medium__excerpt mt2">{{ $content['description'] }}</p>
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
						<div class="st-week-grid__item col col-12 mb5">
							<a href="{{ $content['url'] }}" title="{{ $content['title']}}" class="link-reset">
						        <article class="article-medium relative {{ App::getTermClassName() }} mxn3">
						        	<div class="col col-12 sm-col-6 px3">
						                <div class="article-medium__img-container relative topographic-pattern">
						                    <div class="article-tag mt2 ml2 absolute z3 left-0 top-0">
						                        <div class="article-tag__icon-wrapper">
						                            <div class="article-tag__icon"></div>
						                        </div>
						                    </div>
						                    @php
						                        $thumbnail_id = get_post_thumbnail_id( $content['post']->ID );
						                        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
						                    @endphp
						                    <picture>
						                        <source
						                            data-srcset="{{ $content['image']['sizes']['vh_medium'] . " 1x," . $content['image']['sizes']['vh_medium@2x'] . " 2x" }}" />
						                        <img class="article-medium__img lazyload"
						                            data-src="{{ $content['image']['sizes']['vh_medium'] }}"
						                            alt="{{ get_field("cover_image")["alt"] }}"
						                        />
						                    </picture>
						                </div>
						            </div>
						            <div class="col col-12 sm-col-6 px3">
						                <div class="article-medium__content mt3 {{ App::getTermClassName() }}">
						                    <h3 class="article-medium__title mb1 mt1 pt0">{{ $content['title'] }}</h3>
						                    <p class="article-medium__excerpt mt2">{{ $content['description'] }}</p>
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
						        </article>
						    </a>
						</div>
						@endif
						{{-- LINK FULLSIZE [END] --}}

						{{-- QUOTE --}}
						@if ($content['acf_fc_layout'] === 'quote')
						<div class="st-week-grid__item col col-12 mb5">
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
						<div class="st-week-carousel col col-12 px3 mb5">
							{{ $content['description'] }}
							@foreach ($content['content'] as $item)
				  			<article class="image-blurb image-blurb--fixed-height mt2"> --}}
								<picture>
									<source
										data-srcset="{{ get_the_post_thumbnail_url( $item->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $item->ID, 'vh_large@2x' ) . " 2x" }}" />
									<img class="lazyload"
										 data-src="{{ get_the_post_thumbnail_url( $item->ID, 'vh_large' ) }}"
										 alt="{{ get_field("cover_image")["alt"] }}"
									/>
								</picture>
 								<div class="image-blurb__content">
								    <h3 class="image-blurb__title">{{ $item->post_title }}</h3>
								    <div class="read-more my3">
								        <span class="read-more__text light">
								            <?php _e( 'Läs mer', 'visithalland' ); ?>
								        </span>
								        <div class="read-more__button">
								            <svg class="icon read-more__icon">
								                <use xlink:href="#arrow-right-icon"/>
								            </svg>
								        </div>
								    </div>
								</div>
							</article>
							@endforeach
						</div>
						@endif
						{{-- CAROUSEL [END] --}}

					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endif