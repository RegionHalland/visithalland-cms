@extends('layouts.app')

@section('content')
    @php
        global $wp_query;
        $total_results = $wp_query->found_posts;
    @endphp

   {{ get_search_form() }}

    @foreach ($wp_query->posts as $key => $post)
        {{ $post->post_title }}
    @endforeach
@endsection
