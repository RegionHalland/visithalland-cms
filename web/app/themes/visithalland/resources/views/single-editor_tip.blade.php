@extends('layouts.app')

@section('content')
	@while(have_posts())
    {!! the_post() !!}
    	{{-- Infinite Container Start --}}
		<div id="infinite-container">
		    <article class="{{ App::getTermClassName() }} infinite-item" data-posttype="{{get_post_type()}}">
		        @include('partials.article-hero')
		        @include('partials.article-content')
		        @include('partials.components.next-article')
		    </article>
		</div>
		{{-- Infinite Container End --}}
	@endwhile
	@include('partials.infinite-scroll')
@endsection
