
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
        <div class="container w-11/12  md:w-10/12  pb-4">
            <div class="flex flex-wrap  -mx-3">
                <div class="w-full md:w-8/12  px-3">
                    <div class="article-body w-10/12 ">
                        {{ the_content() }}
                    </div>
                    <address class="author-horizontal mt-3 mb-4">
                        <div class="author-horizontal__img-container">
                            <img
                                data-src="{{ get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_thumbnail@2x"] }}"
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
                <div class="w-full md:w-4/12 px-3">
                    

                </div>
            </div>
        </div>
    </article>
    @endwhile
@endsection
