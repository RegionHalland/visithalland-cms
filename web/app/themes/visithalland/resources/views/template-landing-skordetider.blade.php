{{--
  Template Name: Landing Skordetider
--}}

@extends('layouts.skordetider')

@section('content')
<div class="container mb5">
	<div class="clearfix">
		<div class="col col-12 flex flex-wrap">
		@php($timeline = get_field('timeline'))
		@foreach ($timeline as $day)
			<div class="col col-12">
				<div class="col col-12 px3 mb3">
					<span>{{ $day['date_start'] }}</span>
					<span>{{ $day['date_end'] }}</span>
					@php($date = new DateTime($day['date_start']))
					<span>Vecka {{ $date->format("W") }}</span>
				</div>
			</div>

			@if(isset($day['content']) && is_array($day['content']))
				@foreach ($day['content'] as $item)
					
					@if ($item['acf_fc_layout'] === 'post')
					@php($current = $item['post'])
					<div class="col col-12 md-col-6 px3 mb3">
						<div>
							<div class="weekend__img-container mb3">
								<picture>
		            				<source
										data-srcset="{{ get_the_post_thumbnail_url( $current->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $current->ID, 'vh_medium@2x' ) . " 2x" }}" />
		              				<img class="lazyload"
										 data-src="{{ get_the_post_thumbnail_url( $current->ID, 'vh_medium' ) }}"
										 alt="{{ get_field("cover_image")["alt"] }}"
									/>
		                    	</picture>
							</div>
							<h2><a href="{{ get_permalink($current->ID) }}">{{ $current->post_title }}</a></h2>
							<p>{{ $current->post_excerpt }}</p>
						</div>
					</div>
					@endif

					@if ($item['acf_fc_layout'] === 'link')
					<div class="col col-12 md-col-6 px3 mb3">
						<div>
							<div class="weekend__img-container mb3">
								<picture>
		            				<source
										data-srcset="{{ $item['image']['sizes']['vh_medium'] . " 1x," . $item['image']['sizes']['vh_medium@2x'] . " 2x" }}" />
		              				<img class="lazyload"
										 data-src="{{ $item['image']['sizes']['vh_medium'] }}"
										 alt=""
									/>
		                    	</picture>
							</div>
							<h2><a href="{{ $item['url'] }}">{{ $item['title'] }}</a></h2>
							<p>{{ $item['description'] }}</p>
						</div>
					</div>
					@endif
					
				@endforeach
			@endif

		@endforeach
		</div>
	</div>
</div>
@endsection