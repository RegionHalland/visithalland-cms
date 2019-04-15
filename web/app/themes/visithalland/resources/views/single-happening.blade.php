@extends('layouts.app')

@section('content')
    @while(have_posts())
    {!! the_post() !!}
    <div id="infinite-container">
    	<article class="{{ App::getTermClassName() }} infinite-item" data-posttype="{{get_post_type()}}">
            @include('partials.article.article-hero')
            <div class="article-content container mt-8">
                <div class="w-11/12 lg:w-9/12  mx-auto">
                    <p class="py-1 text-black font-normal leading-normal text-lg">{{ $post->excerpt }}</p>
                    <div class="article-body mt-4">
                        {{ the_content() }}
                    </div>
                    @include('partials.collections.google-details')
                </div>
            </div>
            @include('partials.collections.recommended-happenings')
            @include('partials.components.next-article')
        </article>
        @endwhile
    </div>
    
@include('partials.infinite-scroll')
@endsection
