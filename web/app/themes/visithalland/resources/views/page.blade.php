
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
        <div class="container w-11/12  md:w-10/12 pt-8 pb-4">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-8/12 px-3">
                    <div class="article-body w-10/12">
                        {{ the_content() }}
                    </div>
                    @include('partials.author-horizontal')
                </div>
                <div class="w-full md:w-4/12 px-3">

                </div>
            </div>
        </div>
    </article>
    @endwhile
@endsection
