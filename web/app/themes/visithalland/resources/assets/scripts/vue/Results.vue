<i18n>
    {
        "en": {
            "choose": "Choose alternative",
            "upcomingHappenings": "Upcoming happenings",
            "nearYou": "Near you",
            "destinations": "Exciting destinations",
            "notice": "Important notice",
            "opening_hours": "Keep in mind that opening hours may vary during the season, so please check the opening hours before leaving."
        },
        "sv": {
            "choose": "Välj alternativ",
            "upcomingHappenings": "Kommande happenings",
            "nearYou": "Nära dig",
            "destinations": "Spännande resmål",
            "notice": "Viktig information",
            "opening_hours": "Tänk på att öppettiderna kan variera under säsongen, så kolla gärna öppettiderna innan du ger dig iväg."
        }
  }
</i18n>

<template>
	<div class="card w-11/12 md:w-6/12 lg:w-4/12 mx-auto">
	  <Navigation :input="input" prev-route="activities"></Navigation>
	  <div class="card__content">
        
        <!-- Loading State -->
        <div v-if="loading" class="block mb-3 px-3">
            <Shimmer :loading="loading"></Shimmer>
        </div>
        <!-- Loading State End -->

        <!-- Notice -->
        <div class="result-section px-3 mb-3">
            <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                    {{ $t('notice') }}
            </header>
            <p class="pb-3">{{ $t('opening_hours') }}</p>
        </div>
        <!-- Notice End -->
            
        <!-- Nära dig -->
        <section class="pb-3 px-3 fade-in mb-3" v-if="nearYouArray && nearYouArray.length && input">
            <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                {{ $t('nearYou') }}
            </header>
            <a v-on:click.capture="gaTrack(nearYou)" :href="nearYou.link" class="block mb-3" target="_blank" v-for="nearYou in nearYouArray" :key="nearYou.id">
                <div class="inline-flex w-full">
                    <div class="h-24 w-24 relative rounded bg-grey-light overflow-hidden">
                        <img :src="nearYou.featured_image_src" class="absolute pin-l pin-t w-full h-auto" />
                    </div>
                    <div class="ml-2">
                        <h2 class="text-xl font-bold" v-html="nearYou.title.rendered"></h2>
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
            </a>
        </section>
        <!-- Nära dig End -->
            
        <!-- Att besöka -->
        <div class="pb-3 px-3 fade-in mb-3" v-if="allArray && allArray.length && input">
            <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                {{ $t('destinations') }}
            </header>
            <a v-on:click.capture="gaTrack(link)" :href="link.link" class="block mb-3" target="_blank" v-for="link in allArray" :key="link.id">
                <div class="inline-flex w-full">
                    <div class="h-24 w-24 relative rounded bg-grey-light overflow-hidden">
                        <img :src="link.featured_image_src" class="absolute pin-l pin-t w-full h-auto" />
                    </div>
                    <div class="ml-2">
                        <h2 class="text-xl font-bold" v-html="link.title.rendered"></h2>
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
            </a>
        </div>
        <!-- Att besöka End -->

        <!-- Event Start -->
        <div class="pb-3 px-3 fade-in mb-3" v-if="happeningsArray && happeningsArray.length && input">
            <header class="bg-theme font-rift text-sm font-bold px-3 py-2 mb-3 rounded-full inline-block text-white">
                {{ $t('upcomingHappenings') }}
            </header>
            <a v-on:click.capture="gaTrack(happening)" :href="happening.link" class="block mb-3" target="_blank" v-for="happening in happeningsArray" :key="happening.id">
                <div class="inline-flex w-full">
                    <div class="h-24 w-24 relative rounded bg-grey-light overflow-hidden">
                        <img :src="happening.featured_image_src" class="result__img" />
                    </div>
                    <div class="ml-2">
                        <h2 class="text-xl font-bold" v-html="happening.title.rendered"></h2>
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
            </a>
        </div>
        <!-- Event End -->
	  </div>
	</div>
</template>

<script>
import axios from "axios";

    export default {
        props: [ "input" ],
        data: function(){
            return {
                loading: true,
                nearYouArray: [],
                happeningsArray: [],
                allArray: []
            }
        },
        created() {
            // If we are missing user input redirect the user back to the first page
            if(!this.input) return this.$router.push({ name: "activities"})

            //Fetch post
            this.fetchPost();
        },
        methods: {
            fetchPost(){
                var vm = this;
                axios.get('/wp-json/visit/v1/activity', {
                            params: {
                                "activityId": this.input.activity.id,
                                "date": this.input.date,
                                "user_location_lat": this.input.userLocation.lat,
                                "user_location_lng": this.input.userLocation.lng
                            }
                        }
                    )
                    .then(function (response) {
                        vm.nearYouArray = response.data.near_you
                        vm.happeningsArray = response.data.happenings;
                        vm.allArray = response.data.all_activities;
                        vm.loading = false;
                    })
                    .catch(function (error) {
                        //console.log(error);
                        vm.loading = false;
                    });
            },
            gaTrack(link) {
                this.$ga.event({
                    eventCategory: 'ResultClick',
                    eventAction: "Click",
                    eventLabel: link.title.rendered
                })
            }
        }
    }
</script>
