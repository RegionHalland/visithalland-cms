{{--
  Template Name: Activities
--}}

@extends('layouts.day-in-halland')

@section('content')
    <div class="support-header topographic-pattern py2 fixed top-0 left-0 right-0 z4">
        <div class="support-header__inner container col-11 md-col-10 lg-col-10 mx-auto">
            <a class="support-header__link" href="/">
                <svg class="support-header__icon mr1">
                     <use xlink:href="#arrow-left-icon"/>
                </svg>
                Tillbaka till visithalland.com
            </a>
        </div>
    </div>
    <div class="dh-landing flex items-center justify-center flex-column">
        {{-- PHP/html content starts --}}
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
            <cookie-notice />
        </div>
    </div>
@endsection
