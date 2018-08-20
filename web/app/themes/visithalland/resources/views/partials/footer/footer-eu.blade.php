<div class="clearfix bg-blue-light py3">
    <div class="container col-11 md-col-10 lg-col-10 mx-auto">
        <div class="mxn3">
        <div class="col col-6 sm-col-3 md-col-2 px3 pt3 mt1">
            <img class="max-width-4" src="@asset('images/eu-logo.svg')" />
        </div>
        <div class="col col-12 sm-col-10 md-col-8 px3 py3">
            <p class="italic text-light text-sm max-width-4">
                <!-- TODO: Make dynamic -->
                {{ get_field("eu_excerpt", apply_filters( 'wpml_object_id', get_page_by_path("destination-halland-2020")->ID, 'page' )) }}
            </p>
            <a class="mt3 inline-block" href="https://tillvaxtverket.se/om-tillvaxtverket/organisation/logotyper/logotyp-for-eu-finansierat-stod.html">
                <div class="read-more">
                    <span class="read-more__text light">
                        @php _e('Läs mer om projektet', 'visithalland') @endphp
                    </span>
                    <div class="read-more__button bg-orange-gradient">
                        <svg class="icon read-more__icon">
                            <use xlink:href="#arrow-right-icon"/>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        </div>
    </div>
</div>