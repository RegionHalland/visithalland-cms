@extends('layouts.app')

@section('content')
    {{-- Page Header Start --}}
    @include('partials.page.page-header')
    {{-- Page Header End --}}

    {{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

    {{-- Content Start --}}
    <div class="container w-11/12 lg:w-10/12 pb-4" role="main" id="main-content">
        <div class="flex flex-wrap pt-4 -mx-3">

            {{-- Check for Featured Posts--}}
            @if(is_array($featured_posts) && !empty($featured_posts))
                <div class="w-full lg:w-8/12 mt-8 px-3">

                    {{-- Include Section Header Start --}}
                    @include(
                        'partials.components.header', 
                        [
                            'title' => "Populära guider"
                        ]
                    )
                    {{-- Include Section Header End --}}

                    {{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

                    {{-- Loop Featured Posts Start --}}
                    @foreach($featured_posts as $post)
                        <div class="w-full mb-3">
                            @include('partials.components.article-image-thumbnail', [
                                'title' => $post->post_title,
                                'url' => get_permalink($post->ID),
                                'classes' => "w-full block",
                                'aspect_ratio' => "aspect-container aspect-1 md:aspect-16x9",
                                'theme' => "",
                                'img_lg' => $post->featured_image["sizes"]['vh_hero_wide'],
                                'img_lg_retina' => $post->featured_image["sizes"]['vh_hero_wide'],
                                'img_md' => $post->featured_image["sizes"]['vh_hero_wide'],
                                'img_md_retina' => $post->featured_image["sizes"]['vh_hero_wide'],
                                'img_sm' => $post->featured_image["sizes"]['vh_medium_square'],
                                'img_sm_retina' => $post->featured_image["sizes"]['vh_medium_square'],
                                'img' => $post->featured_image["sizes"]['vh_hero_wide'],
                                'img_alt' => $post->featured_image["alt"],
                                ]
                            )
                        </div>
                    @endforeach
                    {{-- Loop Featured Posts End --}}
                    
                    <div class="mt-6">
                        {{-- Include Section Header Start --}}
                        @include(
                        'partials.components.header', 
                            [
                                'title' => "Fler guider"
                            ]
                        )
                        {{-- Include Section Header End --}}
                        </header>
                        <div class="flex flex-wrap -mx-2">
                            {{-- Check if there's posts --}}
                            @if (have_posts())
                                {{-- Loop All Posts Start --}}
                                @while (have_posts())
                                    @php 
                                        $post = the_post(); 
                                    @endphp
                                    <div class="w-full sm:w-6/12 px-2 mt-4">
                                        {{-- Include Article Thumbnail --}}
                                        @include('partials.components.article-thumbnail', 
                                            [
                                                'title' => get_the_title(),
                                                'excerpt' => "",
                                                'url' => get_the_permalink(),
                                                'classes' => "",
                                                'theme' => "",
                                                'img_sm' => get_the_post_thumbnail_url($post, 'vh_medium' ),
                                                'img_sm_retina' => get_the_post_thumbnail_url($post, 'vh_medium' ),
                                                'img' => get_the_post_thumbnail_url($post, 'vh_medium'),
                                                'img_alt' => "",
                                            ]
                                        )
                                        {{-- Include Article Thumbnail End --}}
                                    </div>          
                               @endwhile
                               {{-- Loop All Posts End --}}
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            {{-- Check for Featured Posts End--}}

            {{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

            {{-- Check for top lists --}}
            @if(is_array($top_lists) && isset($top_lists))
                <aside class="w-full lg:w-4/12 mt-8 flex flex-wrap lg:block">
                    <div class="w-full px-3">
                        @include(
                        'partials.components.header', 
                            [
                                'title' => "Redaktionens tips"
                            ]
                        )
                    </div>
                    @foreach($top_lists as $top_list)
                        <div class="w-full sm:w-6/12 lg:w-full mb-4 px-3">
                            @include('partials.components.top-list')
                        </div>
                    @endforeach
                </aside>
            @endif
            {{-- Check for top lists End --}}
        </div>
    </div>
    {{-- Content End --}}
@endsection