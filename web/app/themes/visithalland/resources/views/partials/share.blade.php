<section class="article-share px-2 py-24 container">
    <div class="mx-auto text-center">
        <h2 class="article-share__title mt-1 mb-0">@php _e( 'Dela artikeln med en vän.', 'visithalland' ) @endphp</h2>
    </div>
    <div class="article-share__buttons text-center mt-4">
        <a href="http://www.facebook.com/share.php?u={{ the_permalink() }}&title={{ the_title() }}" class="btn article-share__button facebook">
            <svg class="article-share__icon">
                <use xlink:href="#facebook-icon"/>
            </svg>
            <span class="article-share__button-label">@php _e( 'Dela på Facebook', 'visithalland' ) @endphp</span>
        </a>
        <a href="http://pinterest.com/pin/create/bookmarklet/?media={{get_the_post_thumbnail_url( get_the_ID(), 'vh_large' )}}&url={{ the_permalink() }}&is_video=false&description={{ the_title() }}" class="btn article-share__button pinterest">
            <svg class="article-share__icon">
                <use xlink:href="#pinterest-icon"/>
            </svg>
            <span class="article-share__button-label">@php _e( 'Pin på pinterest', 'visithalland' ) @endphp</span>
        </a>
    </div>
</section>
