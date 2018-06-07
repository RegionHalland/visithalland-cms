@extends('layouts.landing')

@section('content')
	@php
	$timeline = get_field('timeline');
	@endphp

	@foreach ($timeline as $day)
	<div>
		<div>
			<span>{{ $day['date'] }}</span>
		</div>
		@if(isset($day['content']))
		<div>
		@foreach ($day['content'] as $item)
			<span>hey</span>
		@endforeach
		</div>
		@endif
	</div>
	@endforeach
@endsection