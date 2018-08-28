@extends('layouts.app')

@section('content')
    @php
        while ( have_posts() ) : the_post();
	    $author_id = get_the_author_meta('ID');
        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    @endphp
    <article role="main" id="main-content">


        @include('partials.page.page-header')
        <div class="container col-11 md-col-10 pb4">

            <div class="content-grid__container">

                <div class="content-grid__content">
                    <div class="article-body col-10">
                        {{ the_content() }}
                    </div>
                    <address class="author-horizontal mt3 mb4">
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

                <div class="content-grid__sidebar">
                    @if( have_rows('contact') )
                        <div class="contacts clearfix">
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

                


            </div>
        </div>
        

    </article>
    @endwhile
@endsection
