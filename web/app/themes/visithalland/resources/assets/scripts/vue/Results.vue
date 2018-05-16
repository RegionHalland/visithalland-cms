<i18n>
    {
        "en": {
            "choose": "Choose alternative",
            "upcomingHappenings": "Upcoming happenings",
            "nearYou": "Near you",
            "destinations": "Exciting destinations"
        },
        "sv": {
            "choose": "Välj alternativ",
            "upcomingHappenings": "Kommande happenings",
            "nearYou": "Nära dig",
            "destinations": "Spännande resmål"
        }
  }
</i18n>

<template>
	<div class="card">
	  <Navigation :input="input" prev-route="activities"></Navigation>
	  <div class="card__content">
          <div v-if="loading" class="block mb3 px3">
            <Shimmer :loading="loading"></Shimmer>
          </div>

        <div class="result-section px3" v-if="nearYouArray && nearYouArray.length && input">
            <header class="section-header inline-block coastal-living mb3">
                <div class="section-header__icon-wrapper">
                    <svg class="section-header__icon icon">
                        <use xlink:href="#pin-icon"/>
                    </svg>
                </div>
                <div class="section-header__title">
                    {{ $t('nearYou') }}
                </div>
            </header>
            <a v-on:click.capture="gaTrack(nearYou)" :href="nearYou.link" class="block mb3" target="_blank" v-for="nearYou in nearYouArray" :key="nearYou.id">
                <div class="result inline-flex hiking-biking">
                    <div class="result__img-container mr2">
                        <img :src="nearYou.featured_image_src" class="result__img" />
                    </div>
                    <div class="result__content">
                        <h2 class="result__title" v-html="nearYou.title.rendered"></h2>
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
            </a>
        </div>

        <div class="result-section px3" v-if="allArray && allArray.length && input">
            <header class="section-header inline-block coastal-living mb3">
                <div class="section-header__icon-wrapper">
                    <svg class="section-header__icon icon">
                        <use xlink:href="#discover-icon"/>
                    </svg>
                </div>
                <div class="section-header__title">
                    {{ $t('destinations') }}
                </div>
            </header>
            <a v-on:click.capture="gaTrack(link)" :href="link.link" class="block mb3" target="_blank" v-for="link in allArray" :key="link.id">
                <div class="result inline-flex hiking-biking">
                    <div class="result__img-container mr2">
                        <img :src="link.featured_image_src" class="result__img" />
                    </div>
                    <div class="result__content">
                        <h2 class="result__title" v-html="link.title.rendered"></h2>
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
            </a>
        </div>

        <div class="result-section result__happenings px3 pt3" v-if="happeningsArray && happeningsArray.length && input">
            <header class="section-header inline-block coastal-living mt2 mb3">
                <div class="section-header__icon-wrapper">
                    <svg class="section-header__icon icon">
                        <use xlink:href="#calendar-icon"/>
                    </svg>
                </div>
                <div class="section-header__title">
                    {{ $t('upcomingHappenings') }}
                </div>
            </header>
            <a v-on:click.capture="gaTrack(happening)" :href="happening.link" class="block mb3" target="_blank" v-for="happening in happeningsArray" :key="happening.id">
                <div class="result inline-flex hiking-biking">
                    <div class="result__img-container mr2">
                        <img :src="happening.featured_image_src" class="result__img" />
                    </div>
                    <div class="result__content">
                        <h2 class="result__title" v-html="happening.title.rendered"></h2>
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
            </a>
        </div>
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
                        console.log(error);
                        vm.loading = false;
                    });
            },
            gaTrack(link) {
                console.log("link track", link, this)
                this.$ga.event({
                    eventCategory: 'ResultClick',
                    eventAction: "Click",
                    eventLabel: link.title.rendered
                })
            }
        }
    }
</script>
