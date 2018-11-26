@php 
    $mentions = get_field("mentioned"); 
@endphp
@if(isset($mentions) && is_array($mentions))
    <div class="mt-12">
        @include(
            'partials.components.header', [
            'title' => "Tips från artikeln"]
        )
        <div class="flex flex-wrap -mx-2">
            @foreach ($mentions as $key => $post)
                <div class="w-full md:w-6/12 px-2 mb-3">
                    @include('partials.components.article-thumbnail-small', 
                        [
                            'title' => $post->post_title,
                            'url' => $post->url,
                            'classes' => "block",
                            'theme' => "",
                            'img_md' => $post->featured_image["sizes"]['vh_medium_square'],
                            'img_sm' => $post->featured_image["sizes"]['vh_thumbnail'],
                            'img_sm_retina' => $post->featured_image["sizes"]['vh_thumbnail@2x'],
                            'img' => $post->featured_image["sizes"]['vh_medium_square'],
                            'img_alt' => $post->featured_image["alt"],
                        ]
                    )
                </div>
            @endforeach
        </div>
    </div>
@endif
