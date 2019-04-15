@header(
    [
        'title' => "Fler artiklar"
    ]
)
@endheader
<div class="flex flex-wrap -mx-2 {{ App::getTermClassName() }}">
    @foreach($posts as $post)
        @if($loop->iteration % 3 === 0)
            <div class="w-full px-2 mb-4">
                @article_image_thumbnail(
                    [
                        'title' => $post->post_title,
                        'url' => get_permalink($post->ID),
                        'classes' => "w-full",
                        'aspect_ratio' => "aspect-container aspect-1 md:aspect-16x9",
                        'theme' => "",
                        'img_lg' => $post->featured_image["sizes"]['vh_hero_wide'],
                        'img_lg_retina' => $post->featured_image["sizes"]['vh_hero_wide'],
                        'img_md' => $post->featured_image["sizes"]['vh_hero_wide'],
                        'img_md_retina' => $post->featured_image["sizes"]['vh_hero_wide'],
                        'img_sm' => $post->featured_image["sizes"]['vh_medium_square'],
                        'img_sm_retina' => $post->featured_image["sizes"]['vh_medium_square'],
                        'img' => $post->featured_image["sizes"]['vh_hero_wide'],
                        'img_alt' => $post->featured_image["alt"]
                    ]
                )
                @endarticle_image_thumbnail
            </div>
        @else
            <div class="w-full sm:w-6/12 px-2 mb-4">
                @article_thumbnail(
                    [
                        'title' => $post->post_title,
                        'excerpt' => $post->excerpt,
                        'url' => get_permalink($post->ID),
                        'classes' => "",
                        'theme' => "",
                        'img_sm' => $post->featured_image["sizes"]['vh_medium'],
                        'img_sm_retina' => $post->featured_image["sizes"]['vh_medium'],
                        'img' => $post->featured_image["sizes"]['vh_medium'],
                        'img_alt' => $post->featured_image["alt"]
                    ]
                )
                @endarticle_thumbnail
            </div>
        @endif
    @endforeach
</div>
