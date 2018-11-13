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
        <div class="container w-11/12  md:w-10/12 pb-8">
            <div class="article-body w-full md:w-8/12 ">
                {{ the_content() }}
            </div>
			<div class="w-full mt-8">
				<header class="bg-blue font-rift text-sm font-bold px-3 py-2 rounded-full inline-block text-white">
                    @php _e( 'Kontaktpersoner', 'visithalland' ) @endphp
                </header>
                <div class="-mx-3 flex flex-wrap mt-3">
                    @if( have_rows('contact') )
                        @php while ( have_rows('contact') ) : the_row();
                            $user_id = get_sub_field('contact_person')['ID'];
                        @endphp
                            <address class="w-full sm:w-6/12 md:w-3/12 block mb-4 px-3">
                                <div class="overflow-hidden aspect-container aspect-1 relative rounded">
                                    <img
                                        data-src="{{ get_field('profile_image', 'user_'. $user_id)["sizes"]["vh_medium_square"] }}"
                                        alt="'Skrivet av: ' + {{ get_sub_field('contact_person')['user_firstname'] }}"
                                        class="absolute pin-l pin-t w-full lazyload"
                                    />
                                </div>
                                <div class="">
                                    <h3 class="font-rift font-bold block mt-2">{{ get_sub_field('contact_person')['display_name'] }}</h3>
                                    <span class="font-fira block text-sm italic text-grey-dark mt-2">{{ get_field('role', 'user_'. $user_id) }}</span>
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
