@php $author_id = get_the_author_meta('ID'); @endphp
<address class="inline-flex mt-4 mb-4">
    <div class="overflow-hidden rounded relative bg-blue w-12 h-12">
        <img 
            data-src="{{ get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"] }}"
            alt="@php _e('Skrivet av', 'visithalland') @endphp {{ the_author_meta('display_name') }}"
            class="w-full h-auto absolute pin-l pin-t lazyload"
        />
    </div>
    <div class="pl-3 flex-1">
        <span class="block font-rift roman font-bold text-lg mb-1">{{ the_author_meta('display_name') }}</span>
        <span class="block font-fira text-sm text-grey-dark">{{ get_field('role', 'user_'. $author_id) }}</span>
    </div>
</address>