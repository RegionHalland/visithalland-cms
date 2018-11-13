<section class="topographic-pattern bg-blue box-shadow">
    <div class="container flex justify-between items-center flex-wrap md:flex-no-wrap w-11/12 lg:w-10/12 ">
        <div class="flex items-center md:pr-4">
            <a href="{{ home_url() }}" class="link-reset py-2">
                <picture>
                    <source
                        media="(min-width: 40em)"
                        srcset="@asset('images/logo-horizontal.svg')"/>
                    <source
                        srcset="@asset('images/logo-small.svg')"/>
                    <img
                        class="max-h-4 w-fit mt-1"
                        src="@asset('images/logo-horizontal.svg')"
                        alt="Visithalland.com" />
                </picture>
            </a>
        </div>
        @include('partials.header.header-search')
        @include('partials.header.navigation')
    </div>
</section>

