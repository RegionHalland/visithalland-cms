@php $author_id = get_the_author_meta('ID'); @endphp

<address class="author-horizontal mt4 mb4">
    <div class="author-horizontal__img-container">
        <img 
            data-src="{{ get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"] }}"
            alt="@php _e('Skrivet av', 'visithalland') @endphp {{ the_author_meta('display_name') }}"
            class="author-horizontal__img lazyload"
        />
    </div>
    <div class="author-horizontal__bio">
        <span class="block author-horizontal__name">{{ the_author_meta('display_name') }}</span>
        <span class="block author-horizontal__title">{{ get_field('role', 'user_'. $author_id) }}</span>
    </div>
</address>