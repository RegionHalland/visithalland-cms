{{--
  Template Name: Activities
--}}

@extends('layouts.day-in-halland')

@section('content')


<div class="dh-landing flex items-center justify-center flex-column">
    {{-- PHP/html content starts --}}
    <div class="dh-landing__inner col-11 mx-auto px3">
    <h1 class="dh-landing__title z3 relative">{{ get_the_title() }}</h1>
        <p class="dh-landing__p light z3 relative center mt3">{{ get_the_content() }}</p>
    </div>
    <picture>
        <source media="(min-width: 60em)" srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_wide@2x' ) . " 2x"  }}" />
        <source srcset="{{ get_the_post_thumbnail_url($post, 'vh_hero_tall') . " 1x," . get_the_post_thumbnail_url($post, 'vh_hero_tall@2x') . " 2x"  }}" />
        <img class="dh-landing__img lazyload z2"
            src="{{ get_the_post_thumbnail_url($post, 'vh_hero_wide') }}"
            alt="{{ get_field("cover_image", $post->ID)["alt"] }}" />
    </picture>
</div>

{{-- PHP/html content ends --}}


{{-- Vue below --}}
<div id="app" class="dh-wizard relative">
    <div class="dh-wizard__inner relative">
        <transition :name="transitionName">
            <router-view></router-view>
        </transition>
    </div>
</div>
@endsection
