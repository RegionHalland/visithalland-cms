@extends('layouts.app')

@section('content')
    @while(have_posts())
    {!! the_post() !!}
        <article role="main" id="main-content">
            @include('partials.article-hero')
            <div class="article-content container clearfix mt4">
                <div class="col-11 md-col-10 lg-col-9 mx-auto">
                    <p class="preamble">{{ $post->excerpt }}</p>
                    <div class="article-body mt4">
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
