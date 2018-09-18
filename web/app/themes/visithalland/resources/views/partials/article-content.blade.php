<div class="article-content container clearfix mt4">
    <div class="col-11 md-col-10 lg-col-9 mx-auto">
        <p class="preamble">{{ $post->excerpt }}</p>
        @include('partials.author-horizontal')
        <div class="article-body mt2">
            {{ the_content() }}
        </div>
        @include('partials.mentions')
    </div>
</div>