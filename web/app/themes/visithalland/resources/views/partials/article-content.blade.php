<div class="article-content container mt-8">
    <div class="w-11/12 md:w-10/12 lg:w-9/12 mx-auto">
        <p class="preamble mt-8">{{ $post->excerpt }}</p>
        @include('partials.author-horizontal')
        <div class="article-body mt-6">
            {{ the_content() }}
        </div>
        @include('partials.mentions')
    </div>
</div>