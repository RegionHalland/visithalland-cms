<div class="google-google-details block mt-2">
    @if (get_field("google_information")) 
        <section class="google-details clearfix">
            <div id="map"></div>
             <section id="opening-hours" class="google-details__section google-details__open-hours col w-full sm:w-3/12 list-style-none p0">
                <span class="google-details__section-label block">{{ _e( 'Öppettider', 'visithalland'  )}}</span>
            </section>
            <section class="google-details__section col w-6/12  sm:w-3/12">
                <span class="google-details__section-label block">{{ _e( 'Hitta hit', 'visithalland' ) }}</span>
                <a target="_blank" id="google-details-show-on-map" href="" class="btn inline-block">
                    <svg class="icon btn__icon">
                        <use xlink:href="#pin-icon"/>
                    </svg>
                    {{ _e( 'Visa på karta', 'visithalland') }}
                </a>
            </section>
                <section class="google-details__section col w-6/12  sm:w-4/12">
                    <span class="google-details__section-label block">{{ _e( 'Läs mer', 'visithalland' )}}</span>
                    <a target="_blank" id="google-details-visit-website" href="" class="btn btn--primary inline-block">{{ _e('Gå till webbplats', 'visithalland') }}</a>
                </section>
        </section>

        @else
        <section class="google-details clearfix">
            <section class="google-details__section col w-6/12  sm:w-3/12">
                <span class="google-details__section-label block">{{ _e('Hitta hit', 'visithalland') }}</span>
                <a href="http://www.google.com/maps/place/{{ get_field("location")['lat'] . "," . get_field("location")['lng'] }}" 
                target="_blank" class="btn inline-block">
                    <svg class="icon btn__icon">
                        <use xlink:href="#pin-icon"/>
                    </svg>
                    {{ _e( 'Visa på karta', 'visithalland' )}}
                </a>
            </section>

            @if(get_field("external_link"))
                <section class="google-details__section col w-6/12  sm:w-3/12">
                <span class="google-details__section-label block">{{ _e( 'Läs mer', 'visithalland' )}}</span>
                <a target="_blank" href="{{ get_field("external_link") }}" class="btn btn--primary inline-block">{{ _e('Gå till webbplats', 'visithalland') }}</a>
                </section>
            @endif
        </section>
    @endif
    <div class="google-details__map acf-map">
        <div class="marker" data-lat="{{ get_field("location")['lat']}}" data-lng="{{ get_field("location")['lng']}}"></div>
    </div>
</div>
