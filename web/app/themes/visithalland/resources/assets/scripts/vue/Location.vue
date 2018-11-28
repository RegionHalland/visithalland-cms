<i18n>
    {
        "en": {
            "title": "About location services",
            "paragraph": "If you allow us to access your current location we can give you more relevant information.",
            "allowBtn": "Allow acces to my location",
            "continueWithoutLocationButton": "Continue without using my location"
        },
        "sv": {
            "title": "Om platstjänster",
            "paragraph": "Med din platsinformation kan vi ge bättre tips baserat på väder och avstånd.",
            "allowBtn": "Tillåt platstjänster",
            "continueWithoutLocationButton": "Gå vidare utan plats"
        }
  }
</i18n>

<template>
    <div class="card w-11/12 md:w-6/12 lg:w-4/12 mx-auto">
        <Navigation prev-route="home"></Navigation>
        <div class="card__content text-center flex justify-center align-center flex-col px-3">
            <h3 class="mt-3 mb-3">{{ $t('title') }}</h3>
            <p class="mb-4 w-10/12 mx-auto">{{ $t('paragraph') }}</p>
            <button class="font-rift px-3 py-3 rounded bg-blue font-bold text-base text-white text-center mx-auto" :class="{ loading: loading }" v-on:click="askForLocation()">
                {{ $t('allowBtn') }}
            </button>
            <router-link @click.native="gaTrack()" :to="{name: 'time', params: {input: {userLocation: {lat: 56.973735, lng: 12.582737}}}}">
                <div class="read-more mt-3">
                    <span class="read-more__text">
                        {{ $t('continueWithoutLocationButton') }}
                    </span>
                    <div class="read-more__button">
                        <svg class="read-more__icon">
                            <use xlink:href="#arrow-right-icon"/>
                        </svg>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        props: ["input"],
        data: () => {
            return {
                loading: false
            }
        },
        methods: {
            gaTrack() {
                this.$ga.event({
                    eventCategory: 'Button',
                    eventAction: 'Användning av platsinformation',
                    eventLabel: 'Blockera'
                })
            },
            askForLocation () {
                var vm = this;
                this.loading = true;
                
                    this.$getLocation({
                        timeout: 5000, //defaults to 0
                    })
                    .then(coordinates => {
                        //console.log(coordinates);
                        // TODO: Send to analytics and our location api
                        this.$ga.event({
                            eventCategory: 'Button',
                            eventAction: 'Användning av platsinformation',
                            eventLabel: 'Tillåt'
                        })

                        axios.post('/wp-json/visit/v1/location_by_coordinates', {
                                "lat": coordinates.lat,
                                "lng": coordinates.lng
                            }
                        )
                        .then(function (response) {
                            vm.loading = false;
                            var address_components = response.data.address_components;
                            
                            // If we get no adress we use default coords
                            if(!address_components) return vm.$router.push({ name: "time", params: {input: {userLocation: {lat: 56.973735, lng: 12.582737}}} });
                            
                            var postal_town = address_components.filter(function( obj, k ) {
                                return obj.types == "postal_town"
                            });

                            //Save to ga
                            vm.$ga.event({
                                eventCategory: 'Location',
                                eventAction: postal_town[0].long_name,
                                eventLabel: coordinates.lat + ":" + coordinates.lng
                            })

                            return vm.$router.push({ name: "time", params: {input: {userLocation: {lat: coordinates.lat, lng: coordinates.lng }} }});

                        })
                        .catch(function (error) {
                            //console.log("err", error);
                        });

                    })
                    .catch(function(error){
                        //console.log("myerr", error)
                        vm.$ga.event({
                            eventCategory: 'Button',
                            eventAction: 'Användning av platsinformation',
                            eventLabel: 'Kunde inte hämta information '
                        })
                        return vm.$router.push({ name: "time", params: {input: {userLocation: {lat: 56.973735, lng: 12.582737}}} });
                    });;
            }
        }
    }
</script>
