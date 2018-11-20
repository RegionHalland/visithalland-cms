<div class="w-full sm:w-6/12 lg:w-5/12 xl:w-4/12 px-3 mb-6">
    <img class="mb-2" src="@asset('images/logo-horizontal.svg')" />
    <p class="font-fira italic text-sm text-grey-light mb-4">{{ bloginfo('description') }}</p>
</div>

<div class="w-full sm:w-6/12 lg:w-7/12 xl:w-8/12 flex px-3 mb-6 sm:justify-end items-start">
    @include(
        'partials.components.icon-link', [
        'url' => "mailto:info@visithalland.com", 
        'icon' => "mail-icon",
        'classes' => "mr-2"
        ]
    )
    @include(
        'partials.components.icon-link', [
        'url' => "https://www.facebook.com/visithalland/", 
        'icon' => "facebook-icon",
        'classes' => "mr-2"
        ]
    )
    @include(
        'partials.components.icon-link', [
        'url' => "https://www.instagram.com/visithalland/", 
        'icon' => "instagram-icon"
        ]
    )
</div>

