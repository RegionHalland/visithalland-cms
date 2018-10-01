@extends('layouts.app')
@section('content')
    @include('partials.experience-header')

    @if(count($posts) > 5)
        @include('partials.experience-featured')
        @include('partials.experience-spotlight')
        @include('partials.experience-featured-article')
        <div class="mt2 container col-11 md-col-10 lg-col-10 mx-auto">
            <div class="clearfix mxn3">
                <div class="col col-12 md-col-8 px3 pb5">
                    @include('partials.experience-grid')
                </div>
                <div class="col col-12 md-col-4 px3 mb4">
                    @include('partials.experience-sidebar')
                </div>  
            </div>
        </div>
    @else
        <div class="container col-11 md-col-10 pb4 pt4 {{ App::getTermClassName() }}" role="main" id="main-content">
            <div class="content-grid__container pt4">
                @if(is_array($featured_experiences))
                    <div class="content-grid__content">
                        <header class="bg-theme rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
                            @php _e( 'Utvalda artiklar', 'visithalland' ) @endphp
                        </header>
                        @foreach($featured_experiences as $post)
                            <a class="mb3 block scrim overflow-hidden aspect-container aspect-1 sm-aspect-16x9 md-aspect-3x2 relative rounded" href="{{ $post->url }}" title="{!! $post->post_title !!}">
                                <article>
                                    <picture>
                                        <source media="(min-width:60em)"
                                            data-srcset="{{ $post->featured_image['vh_large'] . " 1x," . $post->featured_image['vh_large@2x'] . " 2x" }}" />
                                        <source media="(min-width:40em)"
                                            data-srcset="{{ $post->featured_image['vh_hero_wide'] . " 1x," . $post->featured_image['vh_hero_wide@2x'] . " 2x" }}" />
                                        <source
                                            data-srcset="{{ $post->featured_image['vh_medium_square'] . " 1x," . $post->featured_image['vh_medium_square@2x'] . " 2x" }}" />
                                        <img class="absolute left-0 top-0 h-fill w-auto lazyload"
                                            data-src="{{ $post->featured_image['vh_medium_square@2x'] }}"
                                            alt="{{ $post->featured_image["alt"] }}"
                                        />
                                    </picture>
                                    <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
                                        <h2 class="text-light">{!! $post->post_title !!}</h2>
                                        <div class="read-more mt3">
                                            <span class="read-more__text light">
                                                @php _e( 'Läs mer', 'visithalland' ); @endphp
                                            </span>
                                            <div class="read-more__button">
                                                <svg class="icon read-more__icon">
                                                    <use xlink:href="#arrow-right-icon"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        @endforeach
                    </div>
                @endif
                @if(is_array($top_lists))
                    <div class="content-grid__sidebar mxn3">
                        <div class="col-12 px3">
                            <header class="bg-theme rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
                                @php _e( 'Redaktionens tips', 'visithalland' ) @endphp
                            </header>
                        </div>
                        @if(isset($top_lists))
                            @foreach($top_lists as $top_list)
                                <div class="col col-12 sm-col-6 md-col-12 mt3 mb3 px3">
                                    @include('partials.components.top-list')
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endif
                <div class="content-grid__bottom-content">
                    @include('partials.experience-grid')
                </div>
            </div>
        </div>
    @endif
@endsection
