<i18n>
    {
        "en": {
            "choose": "Choose alternative",
            "visit": "Go to site",
            "experiences": "Experiences",
            "happens": "Happening"
        },
        "sv": {
            "choose": "Välj alternativ",
            "visit": "Gå till webbplats",
            "experiences": "Upplevelser",
            "happens": "Händer"
        }
  }
</i18n>

<template>
    <div class="card w-11/12 md:w-6/12 lg:w-4/12 mx-auto">
	    <Navigation :input="input" prev-route="time"></Navigation>
	    <div class="card__content">
            <!-- Show while loading -->
            <div v-if="loading" class="block px-3 mb-3">
                <Shimmer :loading="loading"></Shimmer>
            </div>
            <!-- Show while loading End -->

            <!-- Loop Events  -->
            <section class="px-3 pb-3 fade-in" v-if="events_happenings && events_happenings.length && input">
                <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                        {{$t('happens')}} {{ this.currentDay }}
                </header>
                <a v-on:click.capture="gaTrack(event)" :href="event.meta_fields.external_link" target="_blank" v-if="events_happenings && events_happenings.length && input && event.meta_fields && event.meta_fields.external_link" class="block mb-3" v-for="event in events_happenings" :key="event.id">
                    <div class="inline-flex w-full">
                        <div class="h-24 w-24 relative rounded bg-grey-light overflow-hidden">
                            <img :src="event.featured_image_src" class="absolute pin-l pin-t w-full h-auto" />
                        </div>
                        <div class="ml-2">
                            <h2 class="text-xl font-bold" v-html="event.title.rendered"></h2>
                            <div class="read-more mt-1">
                                <span class="read-more__text">
                                    {{ $t('visit') }}
                                </span>
                                <div class="read-more__button">
                                    <svg class="read-more__icon">
                                        <use xlink:href="#arrow-right-icon"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </section>
            <!-- Loop Events End -->

            <!-- Loop Activities -->
            <section class="pb-3 px-3 fade-in" v-if="activities && activities.length && input">
                <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                    {{ $t('experiences') }}
                </header>
                <router-link @click.native="gaTrack(activity)" v-if="activities && activities.length && input" class="block mb-3" v-for="activity in activities" :key="activity.id" :to="{name: 'results', params: {input: {date: input.date, activity: activity, userLocation: input.userLocation}}}">
                    <div class="inline-flex w-full">
                        <div class="h-24 w-24 relative rounded bg-grey-light overflow-hidden">
                            <img :src="activity.featured_image_src" class="absolute pin-l pin-t w-full h-auto" />
                        </div>
                        <div class="ml-2">
                            <h2 class="text-xl font-bold">{{ activity.title.rendered }}</h2>
                            <div class="read-more mt-1">
                                <span class="read-more__text">
                                    {{ $t('choose') }}
                                </span>
                                <div class="read-more__button">
                                    <svg class="read-more__icon">
                                        <use xlink:href="#arrow-right-icon"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </router-link>
            </section>
            <!-- Loop Activities End -->
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        props: [ "input" ],
        data () {
            return {
                loading: true,
                activities: [],
                events_happenings: [],
                currentLang: ''
            }
        },
        created () {
            // If we are missing user input redirect the user back to the first page
            if(!this.input) return this.$router.push({ name: "location"})

            // TODO: make this better, temporary... <-- Hahaha.
            if(this.$i18n.i18next.language == "sv") {
                this.currentLang = "";
            }
            if(this.$i18n.i18next.language == "sv-SE") {
                this.currentLang = "";
            }
            if(this.$i18n.i18next.language != "sv" && this.$i18n.i18next.language != "sv-SE") {
                this.currentLang = "en";
            }

            this.currentDay = this.input.day
            // Fetch activities
            this.fetchData()
        },
        methods: {
            fetchData () {
                var vm = this;
                // Fetch all events happenings
                axios.get(
                        '/wp-json/visit/v1/events_happenings', {
                            params: {
                                "date": this.input.date,
                            }
                        }
                    )
                    .then(function (response) {
                        vm.events_happenings = response.data;
                        vm.loading = false;
                    })
                    .catch(function (error) {
                        //console.log(error);
                        vm.loading = false;
                    });

                // Fetch all activites
                axios.get(
                        '/wp-json/visit/v1/activities', {
                            params: {
                                "lang": this.currentLang,
                                "user_location_lat": this.input.userLocation.lat,
                                "user_location_lng": this.input.userLocation.lng,
                                "date": this.input.date
                            }
                        }
                    )
                    .then(function (response) {
                        vm.activities = response.data;
                        vm.loading = false;
                    })
                    .catch(function (error) {
                        //console.log(error);
                        vm.loading = false;
                    });
            },
            gaTrack(activity) {
                this.$ga.event({
                    eventCategory: 'Aktivitet | Event | Happening',
                    eventAction: activity.type,
                    eventLabel: activity.title.rendered
                })
            }
        }
    }
</script>
