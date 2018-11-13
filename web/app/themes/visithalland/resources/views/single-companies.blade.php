@extends('layouts.app')

@section('content')
    @while(have_posts())
    {!! the_post() !!}
        <article class="{{ App::getTermClassName() }}" role="main" id="main-content">
            @include('partials.article-hero')
            <div class="article-content container clearfix mt-4">
                <div class="w-11/12  md:w-10/12  lg:w-9/12  mx-auto">
                    <p class="preamble">{{ $post->excerpt }}</p>
                    <div class="article-body mt-4">
                        {{ the_content() }}
                    </div>
                    @include('partials.google-details')
                </div>
            </div>
            @include('partials.share')
            @include('partials.recommended-articles')
        </article>
    @endwhile
@endsection
