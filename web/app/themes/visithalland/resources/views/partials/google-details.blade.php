<div class="google-google-details block mt2">
    @if (get_field("google_conditional")) 
        <section class="google-details clearfix ">
            <div id="map"></div>
             <section id="opening-hours" class="google-details__section google-details__open-hours col col-12 sm-col-3 list-style-none p0">
                <span class="google-details__section-label block">{{ _e( 'Öppettider', 'visithalland'  )}}</span>
            </section>
            <section class="google-details__section col col-6 sm-col-3">
                <span class="google-details__section-label block">{{ _e( 'Hitta hit', 'visithalland' ) }}</span>
                <a id="google-details-show-on-map" href="" class="btn inline-block">
                    <svg class="icon btn__icon">
                        <use xlink:href="#pin-icon"/>
                    </svg>
                    {{ _e( 'Visa på karta', 'visithalland') }}
                </a>
            </section>
                <section class="google-details__section col col-6 sm-col-4">
                    <span class="google-details__section-label block">{{ _e( 'Läs mer', 'visithalland' )}}</span>
                    <a id="google-details-visit-website" href="" class="btn btn--primary inline-block">{{ _e('Gå till webbplats', 'visithalland') }}</a>
                </section>
        </section>
        @else
        <section class="google-details clearfix ">
            <section class="google-details__section col col-6 sm-col-3">
                <span class="google-details__section-label block">{{ _e('Hitta hit', 'visithalland') }}</span>
                <a href="http://www.google.com/maps/place/{{ get_field("location")['lat'] . "," . get_field("location")['lng'] }}" class="btn inline-block">
                    <svg class="icon btn__icon">
                        <use xlink:href="#pin-icon"/>
                    </svg>
                    {{ _e( 'Visa på karta', 'visithalland' )}}
                </a>
            </section>

            @if(get_field("external_link"))
                <section class="google-details__section col col-6 sm-col-3">
                    <span class="google-details__section-label block">{{ _e( 'Läs mer', 'visithalland' )}}</span>
                    <a href="{{ get_field("external_link")}}" class="btn btn--primary inline-block">{{ _e('Gå till webbplats', 'visithalland') }}</a>
                </section>
            @endif
        </section>
    @endif
    <div class="google-details__map acf-map">
        <div class="marker" data-lat="{{ get_field("location")['lat']}}" data-lng="{{ get_field("location")['lng']}}"></div>
    </div>
</div>
