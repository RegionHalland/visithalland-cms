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
    <div class="card">
	    <Navigation :input="input" prev-route="time"></Navigation>
	    <div class="card__content">
            <div v-if="loading" class="block px3 mb3">
                <Shimmer :loading="loading"></Shimmer>
            </div>
            <div class="event-section px3 pb3" v-if="events_happenings && events_happenings.length && input">
                <header class="section-header inline-block coastal-living mb3">
                    <div class="section-header__icon-wrapper">
                        <svg class="section-header__icon icon">
                            <use xlink:href="#calendar-icon"/>
                        </svg>
                    </div>
                    <div class="section-header__title">
                        {{$t('happens')}} {{ this.currentDay }}
                    </div>
                </header>
                <a v-on:click.capture="gaTrack(event)" :href="event.meta_fields.external_link" target="_blank" v-if="events_happenings && events_happenings.length && input && event.meta_fields && event.meta_fields.external_link" class="block mb3" v-for="event in events_happenings" :key="event.id">
                    <div class="activity inline-flex">
                        <div class="activity__img-container mr2">
                            <img :src="event.featured_image_src" class="activity__img" />
                        </div>
                        <div class="activity__content">
                            <h2 class="activity__title" v-html="event.title.rendered"></h2>
                            <div class="read-more mt1">
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
            </div>
            <div class="activity-section pb2 px3" v-if="activities && activities.length && input">
                <header class="section-header inline-block coastal-living mb3">
                    <div class="section-header__icon-wrapper">
                        <svg class="section-header__icon icon">
                            <use xlink:href="#discover-icon"/>
                        </svg>
                    </div>
                    <div class="section-header__title">
                        {{ $t('experiences') }}
                    </div>
                </header>
                <router-link @click.native="gaTrack(activity)" v-if="activities && activities.length && input" class="block mb3" v-for="activity in activities" :key="activity.id" :to="{name: 'results', params: {input: {date: input.date, activity: activity, userLocation: input.userLocation}}}">
                    <div class="activity inline-flex">
                        <div class="activity__img-container mr2">
                            <img :src="activity.featured_image_src" class="activity__img" />
                        </div>
                        <div class="activity__content">
                            <h2 class="activity__title">{{ activity.title.rendered }}</h2>
                            <div class="read-more mt1">
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
            </div>
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
