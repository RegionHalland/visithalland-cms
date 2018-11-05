{{--
  Template Name: About Us Page
--}}

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
            <div class="article-body col-12 md-col-8">
                {{ the_content() }}
            </div>
			<div class="col-12 mt4">
				<header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
                    @php _e( 'Kontaktpersoner', 'visithalland' ) @endphp
                </header>
                <div class="mxn3 flex flex-wrap mt3">
                    @if( have_rows('contact') )
                        @php while ( have_rows('contact') ) : the_row();
                            $user_id = get_sub_field('contact_person')['ID'];
                        @endphp
                            <address class="col col-12 sm-col-6 md-col-3 block mb4 px3">
                                <div class="overflow-hidden aspect-container aspect-1 relative rounded">
                                    <img
                                        data-src="{{ get_field('profile_image', 'user_'. $user_id)["sizes"]["vh_medium_square"] }}"
                                        alt="'Skrivet av: ' + {{ get_sub_field('contact_person')['user_firstname'] }}"
                                        class="absolute left-0 top-0 w-fill lazyload"
                                    />
                                </div>
                                <div class="">
                                    <h3 class="rift-font bold block mt2">{{ get_sub_field('contact_person')['display_name'] }}</h3>
                                    <span class="fira-font block text-sm italic text-grey-dark mt2">{{ get_field('role', 'user_'. $user_id) }}</span>
                                    <a class="mt2 text-sm block underline" href="mailto:{{ get_sub_field('contact_person')['user_email'] }}">
                                        {{ get_sub_field('contact_person')['user_email'] }}
                                    </a>
                                </div>
                            </address>
                    	@endwhile
                    @endif
                </div>
            </div>
    	</div>
    </article>
    @endwhile
@endsection
