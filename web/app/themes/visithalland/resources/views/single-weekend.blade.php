@extends('layouts.landing')

@section('content')
<div class="container mb5">
	@php($timeline = get_field('timeline'))

	@foreach ($timeline as $day)
	<div class="flex flex-wrap">
		<div>
			<span>{{ $day['date'] }}</span>
		</div>
		@if(isset($day['content']) && is_array($day['content']))
		<div class="flex-auto pl4">
			@foreach ($day['content'] as $item)
				@if ($item['acf_fc_layout'] === 'post')
					@php($current = $item['post'])
					<h2>{{ $current->post_title }}</h2>
					<p>{{ $current->post_excerpt }}</p>
					<a class="btn btn-primary" href="{{ get_permalink($current->ID) }}">Läs mer</a>
				@endif
				@if ($item['acf_fc_layout'] === 'link')
					@php($current = $item['link'])
					<h2>{{ $current['title'] }}</h2>
					<p>{{ $current['description'] }}</p>
					<a class="btn btn-primary" href="{{ $current['link'] }}">Läs mer</a>
				@endif
			@endforeach
		</div>
		@endif
	</div>
	@endforeach

@endsection
</div>