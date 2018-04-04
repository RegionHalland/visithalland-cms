@extends('layouts.app')

@section('content')
    @php
        while ( have_posts() ) : the_post();
	    $author_id = get_the_author_meta('ID');
    @endphp
    <article class="container" role="main" id="main-content">
        <div class="page-header">
            <div class="page-header__backdrop topographic-pattern">
                <div class="page-header__inner col-11 md-col-10 lg-col-10 mx-auto">
                    <div class="clearfix">
                        <div class="col col-12 sm-col-6">
                            <h1 class="light mt3"> {{ get_the_title() }} </h1>
                        </div>
                        <div class="col col-12 sm-col-6">
                            <p class="preamble light mt3">{{ get_field('excerpt') }}</p>
                        </div>
                        <div class="page-header__img-container col-12">
                            <picture>
                                <source media="(min-width: 40em)"
                                    data-srcset="{{ get_field("cover_image")["sizes"]["vh_large"] . " 1x," . get_field("cover_image")["sizes"]["vh_large@2x"] . " 2x" }}" />
                                <source
                                    data-srcset="{{ get_field("cover_image")["sizes"]["vh_medium"] . " 1x," . get_field("cover_image")["sizes"]["vh_medium@2x"] . " 2x" }}" />
                                <img class="page-header__img lazyload"
                                    data-src="{{ get_field("cover_image")["sizes"]["vh_large"] }}"
                                    alt="{{ get_field("cover_image")["alt"] }}"
                                />
                            </picture>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-11 md-col-10 lg-col-10 mx-auto pb5">
            <div class="clearfix">
                <div class="col col-12 sm-col-9 md-col-8 page__body">
                    <div class="article-body">
                        {{ the_content() }}
                    </div>
                    @if( have_rows('contact') )
                        <div class="contacts mt4 clearfix">
                            <div class="contacts__header">
                                <h3>@php _e( 'Kontaktpersoner', 'visithalland' ) @endphp</h3>
                            </div>
                            @php while ( have_rows('contact') ) : the_row();
                                $user_id = get_sub_field('contact_person')['ID'];
                            @endphp
                            <address class="contact mb2">
                                <div class="contact__img-container">
                                    <img
                                        data-src="{{ get_field('profile_image', 'user_'. $user_id)["sizes"]["vh_profile@2x"] }}"
                                        alt="'Skrivet av: ' + {{ get_sub_field('contact_person')['user_firstname'] }}"
                                        class="contact__img lazyload"
                                    />
                                </div>
                                <div class="contact__bio">
                                    <span class="block contact__name">{{ get_sub_field('contact_person')['display_name'] }}</span>
                                    <span class="block contact__title">{{ get_field('role', 'user_'. $user_id) }}</span>
                                    <a class="contact__email" href="mailto:{{ get_sub_field('contact_person')['user_email'] }}">
                                        {{ get_sub_field('contact_person')['user_email'] }}
                                    </a>
                                </div>
                            </address>
                            @endwhile
                        </div>
                    @endif
                </div>
                <div class="col col-12 sm-col-3 md-col-4 page__sidebar">
                    <address class="author-horizontal mt4 mb4">
                        <div class="author-horizontal__img-container">
                            <img
                                data-src="{{ get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"] }}"
                                alt="'Skrivet av: ' + {{ the_author_meta('display_name') }}"
                                class="author-horizontal__img lazyload"
                            />
                        </div>
                        <div class="author-horizontal__bio">
                            <span class="block author-horizontal__name">{{ the_author_meta('display_name') }}</span>
                            <span class="block author-horizontal__title">{{ get_field('role', 'user_'. $author_id) }}</span>
                        </div>
                    </address>
                </div>
            </div>
        </div>
    </article>
    @endwhile
@endsection
