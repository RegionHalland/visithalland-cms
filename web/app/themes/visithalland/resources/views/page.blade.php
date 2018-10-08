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
                <div class="content-grid__sidebar mxn3">
                    

                </div>
            </div>
        </div>
    </article>
    @endwhile
@endsection
