@extends('layouts.app')

@section('content')

	@while(have_posts())
	{!! the_post() !!}
		<div id="infinite-container">
		    <article class="{{ App::getTermClassName() }} infinite-item" data-posttype="{{get_post_type()}}">
		        @include('partials.article-hero')
		        @include('partials.article-content')
		        @include('partials.share')
		        @include('partials.components.next-article')
		    </article>
		</div>
	@endwhile

@include('partials.infinite-scroll')
@endsection
