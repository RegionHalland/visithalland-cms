@extends('layouts.app')

@section('content')
    @while(have_posts())
    {!! the_post() !!}
        <article class="{{ App::getTermClassName() }}" role="main" id="main-content">
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
            @include('partials.collections.recommended-articles')
        </article>
    @endwhile
@endsection
