<section class="primary-header topographic-pattern bg-blue box-shadow">
    <div class="primary-header__inner container col-11 md-col-10 lg-col-10">
        <div class="primary-header__logo-container flex items-center">
            <a href="/" class="link-reset">
                <picture>
                    <source
                        media="(min-width: 40em)"
                        srcset="@asset('images/logo-horizontal.svg')"/>
                    <source
                        srcset="@asset('images/logo-small.svg')"/>
                    <img
                        class="primary-header__logo"
                        src="@asset('images/logo-horizontal.svg')"
                        alt="Visithalland.com" />
                </picture>
            </a>
        </div>
        @include('partials.header.header-search')
        @include('partials.header.navigation')
    </div>
</section>