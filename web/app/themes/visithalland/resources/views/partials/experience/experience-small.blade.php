<div class="container w-11/12  md:w-10/12  pb-4 pt-4" role="main" id="main-content">
    <div class="flex flex-wrap -mx-3 pt-4">
        <div class="w-full md:w-8/12 mt-4 px-3 {{ App::getTermClassName() }}">
            @if(is_array($taxonomy_featured_posts))
                @include(
                    'partials.components.header', 
                    [
                        'title' => "Utvalda artiklar"
                    ]
                )
                @foreach($taxonomy_featured_posts as $post)
                    <div class="w-full mb-3">
                        @include('partials.components.article-image-thumbnail', [
                            'title' => $post->post_title,
                            'url' => get_permalink($post->ID),
                            'classes' => "w-full block",
                            'aspect_ratio' => "aspect-container aspect-1 lg:aspect-16x9",
                            'theme' => "",
                            'img_lg' => $post->featured_image["sizes"]['vh_hero_wide'],
                            'img_lg_retina' => $post->featured_image["sizes"]['vh_hero_wide'],
                            'img_sm' => $post->featured_image["sizes"]['vh_medium_square'],
                            'img_sm_retina' => $post->featured_image["sizes"]['vh_medium_square'],
                            'img' => $post->featured_image["sizes"]['vh_hero_wide'],
                            'img_alt' => $post->featured_image["alt"],
                            ]
                        )
                    </div>
                @endforeach
            @endif
            <div class="mt-8">
                @include('partials.experience.experience-grid')
            </div>
        </div>
        <div class="w-full md:w-4/12 px-3 mt-4 md:mt0">
            @include('partials.experience.experience-sidebar')
        </div>
    </div>
</div>