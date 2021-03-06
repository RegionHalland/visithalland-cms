<div class="container w-11/12 lg:w-10/12 mx-auto pb-8 mt-8">
    @header(
        [
            'title' => "Fler liknande artiklar"
        ]
    )
    @endheader
    <div class="flex flex-wrap -mx-2 mb-4">
        @foreach ($recommended_articles as $key => $post)
            <div class="w-full sm:w-6/12 lg:w-4/12 px-2 mt-3">
                @article_image_thumbnail(
                    [
                        'title' => $post->post_title,
                        'url' => get_permalink($post->ID),
                        'classes' => "w-full",
                        'aspect_ratio' => "aspect-container aspect-1 lg:aspect-5x4",
                        'theme' => "",
                        'img_lg' => get_the_post_thumbnail_url($post->ID, 'vh_hero_tall' ),
                        'img_lg_retina' => get_the_post_thumbnail_url($post->ID, 'vh_hero_tall@2x' ),
                        'img_sm' => get_the_post_thumbnail_url($post->ID, 'vh_medium_square' ),
                        'img_sm_retina' => get_the_post_thumbnail_url($post->ID, 'vh_medium_square@2x' ),
                        'img' => get_the_post_thumbnail_url($post->ID, 'vh_hero_tall@2x' ),
                        'img_alt' => "",
                    ]
                )
                @endarticle_image_thumbnail
            </div>
        @endforeach
    </div>
</div>
