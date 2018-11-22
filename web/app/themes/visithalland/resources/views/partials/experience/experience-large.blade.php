{{-- Experience Featured Posts Start --}}
<div class="mt-12 mb-12 container w-11/12 lg:w-10/12 mx-auto {{ App::getTermClassName() }}">
    @include(
        'partials.components.header', [
        'title' => "Utvalda artiklar"]
    )
    @include('partials.components.masonry-grid', [
    	'posts' => $taxonomy_featured_posts,
    	]
    )
</div>
{{-- Experience Featured Posts End --}}

{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

{{-- Carousel Start --}}
@if(isset($taxonomy_carousel_posts) && !empty($taxonomy_carousel_posts))
    <div class="overflow-hidden">
        <div class="mb-12 container w-11/12 lg:w-10/12 mx-auto">
            @include('partials.components.carousel', [
                'posts' => $taxonomy_carousel_posts,
                ]
            )
        </div>
    </div>
@endif
{{-- Carousel End --}}

{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

{{-- Featured Article Start --}}
@if(isset($featured_article) && !empty($featured_article))
    @include('partials.components.article-full', 
        [
            'title' => $featured_article->post_title,
            'url' => $featured_article->url,
            'classes' => "w-full",
            'aspect_ratio' => "aspect-container aspect-5x4 md:aspect-1 lg:aspect-16x9",
            'theme' => App::getTermClassName(),
            'img_lg' => $featured_article->featured_image["sizes"]['vh_hero_wide'],
            'img_lg_retina' => $featured_article->featured_image["sizes"]['vh_hero_wide@2x'],
            'img_md' => $featured_article->featured_image["sizes"]['vh_medium_square'],
            'img_md_retina' => $featured_article->featured_image["sizes"]['vh_medium_square@2x'],
            'img_sm' => $featured_article->featured_image["sizes"]['vh_hero_tall'],
            'img_sm_retina' => $featured_article->featured_image["sizes"]['vh_hero_tall@2x'],
            'img' => $featured_article->featured_image["sizes"]['vh_hero_wide'],
            'img_alt' => $featured_article->featured_image["alt"],
        ]
    )
@endif
{{-- Featured Article End --}}

{{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}

{{-- Grid Start --}}
<div class="mt-2 container w-11/12 lg:w-10/12 mx-auto">
    <div class="flex flex-wrap mt-8 -mx-3">
        <div class="w-full lg:w-8/12 px-3 pb-5">
            {{-- Post Grid Start --}}
            @include('partials.experience.experience-grid')
            {{-- Post Grid End --}}
        </div>
        <aside class="w-full lg:w-4/12 px-3 mb-6">
            {{-- Sidebar Start --}}
            @include('partials.experience.experience-sidebar')
            {{-- Sidebar End --}}
        </aside>  
    </div>
</div>
{{-- Grid End --}}