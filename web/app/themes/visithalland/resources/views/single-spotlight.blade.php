@extends('layouts.app')

@section('content')

    @while(have_posts())
    {!! the_post() !!}
        <div id="infinite-container">
            <article class="{{ App::getTermClassName() }} infinite-item" data-posttype="{{get_post_type()}}">
                @include('partials.article-hero')
                <div class="article-content container clearfix mt-5 mb-4">
                    <div class="w-11/12  md:w-10/12  lg:w-8/12  mx-auto">
                        <p class="preamble">{{ get_field("excerpt") }}</p>
                        @include('partials.author-horizontal')
                    </div>
                </div>
                @include('partials.spotlight-grid')
                @include('partials.share')
                @include('partials.components.next-article')
            </article>
        </div>
    @endwhile
    @include('partials.infinite-scroll')
@endsection
