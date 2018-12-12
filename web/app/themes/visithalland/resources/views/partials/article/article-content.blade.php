<div class="article-content container mt-8 pb-8">
    <div class="w-11/12 md:w-10/12 lg:w-9/12 mx-auto">
        <p class="py-1 text-black font-normal leading-normal text-lg mt-8">{{ $post->excerpt }}</p>
        @author()@endauthor
        <div class="article-body mt-6">
            {{ the_content() }}
        </div>
        @include('partials.collections.mentions')
    </div>
</div>