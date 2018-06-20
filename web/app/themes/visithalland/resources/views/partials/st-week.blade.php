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
					<h2 class="h1 mb2">{{ $week['title'] }}</h2>
					<p>{{ $week['description'] }}</p>
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
						
						{{-- POST--}}
						@if ($content['acf_fc_layout'] === 'post')
						<div class="col col-12 {{ $content['fullsize'] === true ? '' : 'sm-col-6' }} px3 mb4">
							<article class="st-week-post">
								<div class="st-week-post__img-container">
									<picture>
										<source
											data-srcset="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $content['post']->ID, 'vh_large@2x' ) . " 2x" }}" />
										<img class="lazyload"
											 data-src="{{ get_the_post_thumbnail_url( $content['post']->ID, 'vh_large' ) }}"
											 alt="{{ get_field("cover_image")["alt"] }}"
										/>
									</picture>
								</div>
								<div class="st-week-post__content">
									<h3>{{ $content['post']->post_title }}</h3>
									<p>{{ $content['post']->excerpt }}</p>
								</div>
							</article>
						</div>
						@endif
						{{-- POST [END] --}}

						{{-- QUOTE --}}
						@if ($content['acf_fc_layout'] === 'quote')
						<div class="col col-12 px3 mb4">
		
							<div class="st-week-quote__img-container">
								
							</div>
							<div class="st-week-quote__content">
								<blockquote>{{ $content['quote'] }}</blockquote>
								<p>{{ $content['quoted'] }}</p>
							</div>
						</div>
						@endif
						{{-- QUOTE [END] --}}

					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endif