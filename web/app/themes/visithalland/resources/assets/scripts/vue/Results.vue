<template>
	<div class="card">
	  <Navigation :input="input" prev-route="activities"></Navigation>
	  <div class="card__content">

        <div v-if="loading" class="block mb3">
            <div class="shimmer inline-flex">
                <div class="shimmer__img mr2"></div>
                <div class="shimmer__content">
                    <div class="shimmer__title mb1"></div>
                    <div class="shimmer__link mt1"></div>
                    <div class="shimmer__button mt1"></div>
                </div>
            </div>
            <div class="shimmer inline-flex">
                <div class="shimmer__img mr2"></div>
                <div class="shimmer__content">
                    <div class="shimmer__title mb1"></div>
                    <div class="shimmer__link mt1"></div>
                    <div class="shimmer__button mt1"></div>
                </div>
            </div>
            <div class="shimmer inline-flex">
                <div class="shimmer__img mr2"></div>
                <div class="shimmer__content">
                    <div class="shimmer__title mb1"></div>
                    <div class="shimmer__link mt1"></div>
                    <div class="shimmer__button mt1"></div>
                </div>
            </div>
            <div class="shimmer inline-flex">
                <div class="shimmer__img mr2"></div>
                <div class="shimmer__content">
                    <div class="shimmer__title mb1"></div>
                    <div class="shimmer__link mt1"></div>
                    <div class="shimmer__button mt1"></div>
                </div>
            </div>
            <div class="shimmer inline-flex">
                <div class="shimmer__img mr2"></div>
                <div class="shimmer__content">
                    <div class="shimmer__title mb1"></div>
                    <div class="shimmer__link mt1"></div>
                    <div class="shimmer__button mt1"></div>
                </div>
            </div>
        </div>

        <div v-if="nearYouArray && nearYouArray.length && input">
            <header class="result-header">
                Nära dig
            </header>
            <a :href="nearYou.link" class="block mb3" v-for="nearYou in nearYouArray" :key="nearYou.id">
                <div class="result inline-flex hiking-biking">
                    <img :src="nearYou.imgUrl" class="result__img mr2" />
                    <div class="result__content">
                        <h2 class="result__title" v-html="nearYou.title.rendered"></h2>
                        <div class="read-more mt1">
                            <span class="read-more__text">
                                Välj alternativ
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

        <div v-if="happeningsArray && happeningsArray.length && input">
            <header class="result-header">
                Happenings
            </header>
            <a :href="happening.link" class="block mb3" v-for="happening in happeningsArray" :key="happening.id">
                <div class="result inline-flex hiking-biking">
                    <img :src="happening.imgUrl" class="result__img mr2" />
                    <div class="result__content">
                        <h2 class="result__title" v-html="happening.title.rendered"></h2>
                        <div class="read-more mt1">
                            <span class="read-more__text">
                                Välj alternativ
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

        <div v-if="allArray && allArray.length && input">
            <header class="result-header">
                Alla
            </header>
            <a :href="link.link" class="block mb3" v-for="link in allArray" :key="link.id">
                <div class="result inline-flex hiking-biking">
                    <img :src="link.imgUrl" class="result__img mr2" />
                    <div class="result__content">
                        <h2 class="result__title" v-html="link.title.rendered"></h2>
                        <div class="read-more mt1">
                            <span class="read-more__text">
                                Välj alternativ
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
                axios
                    .get(
                        '/wp-json/myplugin/v1/activity', {
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

                        if(vm.nearYouArray){
                            vm.nearYouArray.map((element, index) => {
                                vm.fetchImage(element, element.featured_media);
                            })
                        }
                        if(vm.happeningsArray){
                            vm.happeningsArray.map((element, index) => {
                                vm.fetchImage(element, element.featured_media);
                            })
                        }
                        if(vm.allArray){
                            vm.allArray.map( (element) => {
                                vm.fetchImage(element, element.featured_media);
                            })
                        }
                        vm.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                        vm.loading = false;
                    });
            },
            fetchImage(element, imageId){
                var vm = this;
                axios.get('/wp-json/wp/v2/media/'+imageId)
                    .then(function (response) {
                        var imgUrl = response.data.media_details.sizes["vh_thumbnail"].source_url;
                        element.imgUrl = imgUrl;

                        // TODO: This should not be needed
                        vm.$forceUpdate()
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
