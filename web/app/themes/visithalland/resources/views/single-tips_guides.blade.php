@extends('layouts.app')

@section('content')
	@php while( have_posts() ) : the_post();
	    $thumbnail_id = get_post_thumbnail_id();
	    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	    $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
	@endphp
	<div id="infinite-container">
	    <article class="{{ App::getTermClassName() }}" role="main" id="main-content">
	        @include('partials.article-hero')
	        @include('partials.article-content')
	        @include('partials.share')
	    </article>
	</div>
@endwhile

@include('partials.infinite-scroll')
@endsection