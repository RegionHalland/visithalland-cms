<div class="article-content container clearfix mt-4">
    <div class="w-11/12  md:w-10/12  lg:w-9/12  mx-auto">
        <p class="preamble">{{ $post->excerpt }}</p>
        @include('partials.author-horizontal')
        <div class="article-body mt-2">
            {{ the_content() }}
        </div>
        @include('partials.mentions')
    </div>
</div>