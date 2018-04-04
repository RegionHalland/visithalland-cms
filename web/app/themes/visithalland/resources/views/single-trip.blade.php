@extends('layouts.app')

@section('content')
    <div id="infinite-container">
        @php while ( have_posts() ) : the_post();
            $post->ID = get_the_id();
            $thumbnail_id = get_post_thumbnail_id();
            $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
        @endphp

        <article class="container" role="main" id="main-content" data-posttype="{{get_post_type()}}">
            @include('partials.article-hero')

            <div class="article-content clearfix mt5 mb4">
                <div class="col-11 md-col-10 lg-col-8 mx-auto">
                    <p class="preamble">{{ get_field("excerpt") }}</p>
                    @include('partials.author-horizontal')
                </div>
            </div>

            @include('partials.spotlight-grid')
            @include('partials.share')
            </article>
        @endwhile

    </div>
    @include('partials.infinite-scroll')
@endsection
