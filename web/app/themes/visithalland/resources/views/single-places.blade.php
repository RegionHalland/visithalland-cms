@extends('layouts.app')

@section('content')
    @php while ( have_posts() ) : the_post(); @endphp
    @php
        $author_id = get_the_author_meta('ID');
        $post_id = get_the_id();
        $currentTerm = count(get_the_terms($post, "taxonomy_concept")) ? get_the_terms($post, "taxonomy_concept")[0] : "";
        $thumbnail_id = get_post_thumbnail_id();
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
    @endphp


<article role="main" id="main-content">
    @include('partials.article-hero')
    <div class="article-content container clearfix mt5">
        <div class="col-11 md-col-10 lg-col-8 mx-auto">
            <p class="preamble">{{ get_field("excerpt") }}</p>
            <div class="article-body mt4">
                {{ the_content() }}
            </div>
            @include('partials.google-details')
        </div>
    </div>
    @include('partials.share')
    @include('partials.recommended-articles')
</article>

    @endwhile
@endsection
