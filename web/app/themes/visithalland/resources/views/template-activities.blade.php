{{--
  Template Name: Activities
--}}

@extends('layouts.day-in-halland')

@section('content')


<div class="dh-landing flex items-center justify-center flex-column">
    {{-- PHP/html content starts --}}
    <h1 class="dh-landing__title z3 relative">{{ get_the_title() }}</h1>
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
<div id="app" class="wizard">
    {{-- TODO: Remove ! before isOffline --}}
    <div class="offline-bar" v-if="!isOffLine">
        <div class="offline-bar__inner">Ingen internetanslutning</div>
    </div>

    <div class="card-container relative">
        <transition>
            <router-view routeBefore="asd"></router-view>
        </transition>
    </div>
    <div class="progress-bar mx-auto">
      <span class="progress-bar__indicator"></span>
    </div>
    <div class="ful-router relative z4">
        <router-link to="/">Hem</router-link>
        <router-link to="/location">Location</router-link>
        <router-link to="/time">Få inspiration</router-link>
        <router-link to="/activities">Activities</router-link>
        <router-link to="/results">Results</router-link>
    </div>
</div>
@endsection
