@extends('layouts.app')

@section('content')
    @while(have_posts())
    {!! the_post() !!}
        <div id="infinite-container">
            <article class="{{ App::getTermClassName() }} infinite-item" data-posttype="{{get_post_type()}}">
                @include('partials.article.article-hero')
                <div class="article-content container flex flex-wrap mt-8 mb-8">
                    <div class="w-11/12 lg:w-8/12  mx-auto">
                        <p class="py-1 text-black font-normal leading-normal text-lg">{{ get_field("excerpt") }}</p>
                        @include('components.author')
                    </div>
                </div>
                @if(isset($spotlights) && !empty($spotlights)) 
                    @include('partials.grids.spotlight-grid', [
                        'posts' => $spotlights,
                        ]
                    )
                @endif
                @include('partials.components.next-article')
            </article>
        </div>
    @endwhile
    @include('partials.infinite-scroll')
@endsection
