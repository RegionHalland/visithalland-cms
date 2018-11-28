{{--
  Template Name: Activities
--}}

@extends('layouts.day-in-halland')

@section('content')
    @include('partials.navigation.external-header')

    {{-- PHP/html content starts --}}
    <div class="h-full w-full absolute overflow-hidden pin-t pin-l pin-r flex items-center justify-center flex-col bg-black">
        <picture>
            <source media="(min-width: 60em)" srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_wide@2x' ) . " 2x"  }}" />
            <source srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_tall') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_tall@2x') . " 2x"  }}" />
            <img class="absolute h-full w-auto max-w-none md:w-full md:h-auto opacity-50 absolute-center lazyload z-20"
                src="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') }}"
                alt="{{ get_field("cover_image", $post->ID)["alt"] }}" />
        </picture>
    </div>
    {{-- PHP/html content ends --}}

    {{-- Vue below --}}
    <div id="app" class="app-container p-3 z-40 absolute pin-l pin-r pin-b flex flex-col justify-end h-full">
        <transition :name="transitionName">
            <router-view></router-view>
        </transition>
        <cookie-notice />
    </div>
@endsection
