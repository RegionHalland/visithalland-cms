<section class="topographic-pattern bg-blue box-shadow">
    <div class="container flex justify-between items-center flex-wrap md-flex-nowrap col-11 md-col-10 lg-col-10">
        <div class="flex items-center md-pr4">
            <a href="/" class="link-reset py2">
                <picture>
                    <source
                        media="(min-width: 40em)"
                        srcset="@asset('images/logo-horizontal.svg')"/>
                    <source
                        srcset="@asset('images/logo-small.svg')"/>
                    <img
                        class="max-height-4 fit mt1"
                        src="@asset('images/logo-horizontal.svg')"
                        alt="Visithalland.com" />
                </picture>
            </a>
        </div>
        @include('partials.header.header-search')
        @include('partials.header.navigation')
    </div>
</section>

