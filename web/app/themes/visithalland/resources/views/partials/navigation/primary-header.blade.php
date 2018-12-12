<div class="topographic-pattern bg-blue shadow">
    <div class="container flex justify-between items-center flex-wrap md:flex-no-wrap w-11/12 lg:w-10/12 ">
        <div class="flex items-center lg:pr-4">
            <a href="{{ home_url() }}" class="link-reset mt-2 md:mt-0">
                <picture>
                    <source
                        media="(min-width: 992px)"
                        srcset="@asset('images/logo-horizontal.svg')"/>
                    <source
                        srcset="@asset('images/logo-small.svg')"/>
                    <img
                        class="md:mt-1"
                        src="@asset('images/logo-horizontal.svg')"
                        alt="Visithalland.com" />
                </picture>
            </a>
        </div>
        @include('partials.navigation.header-search')
        @include('partials.navigation.navigation')
    </div>
</div>

