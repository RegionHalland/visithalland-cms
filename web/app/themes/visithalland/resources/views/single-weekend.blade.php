@extends('layouts.landing')

@section('content')
<div class="container mb5">
	<div class="clearfix">
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
						<div class="img-container">
							<picture>
	            				<source
									data-srcset="{{ get_the_post_thumbnail_url( $current->ID, 'vh_large' ) . " 1x," . get_the_post_thumbnail_url( $current->ID, 'vh_large@2x' ) . " 2x" }}" />
	              				<img class="lazyload"
									 data-src="{{ get_the_post_thumbnail_url( $current->ID, 'vh_large' ) }}"
									 alt="{{ get_field("cover_image")["alt"] }}"
								/>
	                    	</picture>
						</div>
					<a href="{{ get_permalink($current->ID) }}"><h2>{{ $current->post_title }}</h2></a>
					<p>{{ $current->post_excerpt }}</p>
					</div>
				</div>
				@endif

{{-- 				@if ($item['acf_fc_layout'] === 'link')
				@php($current = $item['link'])
				<div class="col col-12 md-col-6 px3 mb3">
					<a href="{{ $current['link'] }}"><h2>{{ $current['title'] }}</h2></a>
					<p>{{ $current['description'] }}</p>
				</div>
				@endif --}}
				
			@endforeach
		@endif

	@endforeach
	</div>
</div>
@endsection