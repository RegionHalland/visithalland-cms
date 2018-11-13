<div class="place__details col w-full md:col-5">
    @if (get_field("google_conditional")) 
        <section class="details clearfix ">
            <div id="map"></div>
            <section id="opening-hours" class="details__section details__open-hours col w-full list-style-none p0">
                <span class="details__section-label block">{{ _e( 'Öppettider', 'visithalland'  )}}</span>
            </section>
            <section class="details__section col w-full">
                <span class="details__section-label block">{{ _e( 'Hitta hit', 'visithalland' ) }}</span>
                <a id="details-show-on-map" href="" class="details__phone block">
                    <svg class="icon details__icon">
                        <use xlink:href="#pin-icon"/>
                    </svg>
                    {{ _e( 'Visa på karta', 'visithalland') }}
                </a>
            </section>
                <section class="details__section col w-full">
                    <span class="details__section-label block">{{ _e( 'Läs mer', 'visithalland' )}}</span>
                    <a id="details-visit-website" href="" class="btn btn--primary inline-block">{{ _e('Gå till webbplats', 'visithalland') }}</a>
                </section>
        </section>
    @else
        <section class="details clearfix ">
            <section class="details__section col w-full">
                <span class="details__section-label block">{{ _e('Visa på karta', 'visithalland') }}</span>
                <a href="http://www.google.com/maps/place/{{ get_field("location")['lat'] . "," . get_field("location")['lng'] }}" class="details__phone block">
                    <svg class="icon details__icon">
                        <use xlink:href="#pin-icon"/>
                    </svg>
                    {{ _e( 'Visa på karta', 'visithalland' )}}
                </a>
            </section>

            @if(isset(get_field("external_links")[0]["link"]))
                <section class="details__section col w-full">
                    <span class="details__section-label block">{{ _e( 'Läs mer', 'visithalland' )}}</span>
                    <a href="{{ get_field("external_links")[0]["link"] }}" class="btn btn--primary inline-block">{{ _e('Gå till webbplats', 'visithalland') }}</a>
                </section>
            @endif
        </section>
    @endif
</div>
