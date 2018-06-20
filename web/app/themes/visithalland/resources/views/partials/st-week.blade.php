@if(isset($week))
<div class="st-week">
	<header class="st-week-header">
		<div class="container">
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
					<h2 class="h1 mb4">{{ $week['title'] }}</h2>
					<p class="st-week-header__description mb3">{{ $week['description'] }}</p>
				</div>
			</div>
		</div>
	</header>
	<div>
		<div class="container">
			<div class="clearfix flex flex-wrap">
				<div class="st-timeline col col-12 sm-col-2">
					<div class="st-timeline__line"></div>
				</div>
				<div class="col col-12 sm-col-10 mb4 st-week-grid mxn3">
					@foreach ($week['content'] as $content)
						
						{{-- POST --}}
						@if ($content['acf_fc_layout'] === 'post' && $content['fullsize'] != true)
						<div class="col col-12 sm-col-6 px3 mb5">
							<article class="st-week-post">
								<a href={{ get_permalink($content['post']->ID) }}>
									<div class="st-week-post__img-container mb3">
										<picture>
											<source
												data-srcset="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $content['post']->ID, 'vh_large@2x' ) . " 2x" }}" />
											<img class="lazyload"
												 data-src="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_large' ) }}"
												 alt="{{ get_field("cover_image")["alt"] }}"
											/>
										</picture>
									</div>
								</a>
								<div class="st-week-post__content">
									<h3 class="h2 mb3"><a href={{ get_permalink($content['post']->ID) }}>{{ $content['post']->post_title }}</a></h3>
									<p>{{ $content['post']->excerpt }}</p>
								</div>
							</article>
						</div>
						@endif
						{{-- POST [END] --}}

						{{-- POST FULLSIZE --}}
						@if ($content['acf_fc_layout'] === 'post' && $content['fullsize'] === true)
						<div class="col col-12 mb5">
							<article class="st-week-post">
								<a class="col col-12 sm-col-6 px3" href={{ get_permalink($content['post']->ID) }}>
									<div class="st-week-post__img-container mb3">
										<picture>
											<source
												data-srcset="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $content['post']->ID, 'vh_large@2x' ) . " 2x" }}" />
											<img class="lazyload"
												 data-src="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_large' ) }}"
												 alt="{{ get_field("cover_image")["alt"] }}"
											/>
										</picture>
									</div>
								</a>
								<div class="col col-12 sm-col-6 px3">
									<h3 class="h2 mb3"><a href={{ get_permalink($content['post']->ID) }}>{{ $content['post']->post_title }}</a></h3>
									<p>{{ $content['post']->excerpt }}</p>
								</div>
							</article>
						</div>
						@endif
						{{-- POST FULLSIZE [END]--}}

						{{-- LINK --}}
						@if ($content['acf_fc_layout'] === 'link' && $content['fullsize'] != true)
						<div class="col col-12 {{ $content['fullsize'] === true ? '' : 'sm-col-6' }} px3 mb5">
							<article class="st-week-post">
								<a href={{ $content['url'] }}>
									<div class="st-week-post__img-container mb3">
										<picture>
											<source
												data-srcset="{{ $content['image']['sizes']['vh_large@2x'] . " 1x," . $content['image']['sizes']['vh_large'] . " 2x" }}" />
											<img class="lazyload"
												data-src="{{ $content['image']['sizes']['vh_large@2x'] }}"
												alt="{{ get_field("cover_image")["alt"] }}"
											/>
										</picture>
									</div>
								</a>
								<div class="st-week-post__content">
									<h3 class="h2 mb3"><a href={{ $content['url'] }}>{{ $content['title']}}</a></h3>
									<p>{{ $content['description'] }}</p>
								</div>
							</article>
						</div>
						@endif
						{{-- LINK [END] --}}

						{{-- LINK FULLSIZE --}}
						@if ($content['acf_fc_layout'] === 'link' && $content['fullsize'] === true)
						<div class="col col-12 mb5">
							<article class="st-week-post">
								<a class="col col-12 sm-col-6 px3" href={{ $content['url'] }}>
									<div class="st-week-post__img-container mb3">
										<picture>
											<source
												data-srcset="{{ $content['image']['sizes']['vh_large@2x'] . " 1x," . $content['image']['sizes']['vh_large'] . " 2x" }}" />
											<img class="lazyload"
												data-src="{{ $content['image']['sizes']['vh_large@2x'] }}"
												alt="{{ get_field("cover_image")["alt"] }}"
											/>
										</picture>
									</div>
								</a>
								<div class="col col-12 sm-col-6 px3">
									<h3 class="h2 mb3"><a href={{ $content['url'] }}>{{ $content['title']}}</a></h3>
									<p>{{ $content['description'] }}</p>
								</div>
							</article>
						</div>
						@endif
						{{-- LINK FULLSIZE [END] --}}

						{{-- QUOTE --}}
						@if ($content['acf_fc_layout'] === 'quote')
						<div class="col col-12 px3 mb5">
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


						{{-- QUOTE --}}
						@if ($content['acf_fc_layout'] === 'carousel')
							@php(var_dump($content))
							@foreach()
							@endforeach
						@endif
						{{-- QUOTE [END] --}}

					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endif