<template>
	<div class="card">
	  <Navigation :input="input" prev-route="activities"></Navigation>
	  <div class="card__content">

        <div v-if="loading" class="center pt4 px2">
            <svg width="61px" height="68px" viewBox="0 0 61 68" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-160.000000, -299.000000)">
                        <g id="weather-icon" transform="translate(160.000000, 299.000000)">
                            <circle id="weather-icon__sun" fill="#E1742F" cx="48" cy="13" r="13"></circle>
                            <path d="M22.9090909,2.62856514 C14.8375182,2.62856514 8.9264,8.96253486 8.27272727,16.0249937 C3.44342727,17.8134743 0,22.3978469 0,27.7714411 C0,34.6920754 5.72078182,40.3428697 12.7272727,40.3428697 L43.2727273,40.3428697 C50.5785636,40.3428697 56,35.2953783 56,29.028584 C56,24.2316411 52.9274455,19.5930857 48.1846909,18.1071366 C47.7503727,14.4994383 45.8793364,11.6455229 43.2925818,10.1124937 C40.8337364,8.65524514 37.87,8.36724629 35.1193182,9.18927943 C32.6600273,5.50357543 28.3955636,2.62856514 22.9090909,2.62856514 Z M22.9090909,6.39999371 C27.6039273,6.39999371 31.0443,9.09434 32.6534091,12.273208 C33.1317838,13.2000563 34.2796594,13.5692024 35.2187818,13.098208 C37.1665636,12.1362234 39.5137909,12.2690154 41.3437818,13.3535651 C43.1737091,14.4381149 44.5454545,16.4047577 44.5454545,19.5999937 C44.551871,20.5152597 45.222699,21.2938388 46.1363636,21.4464411 C49.6147273,22.022904 52.1818182,25.5355497 52.1818182,29.028584 C52.1818182,33.2334126 48.9088727,36.5714411 43.2727273,36.5714411 L12.7272727,36.5714411 C7.78425455,36.5714411 3.81818182,32.6538697 3.81818182,27.7714411 C3.81818182,23.6398411 6.68442727,20.2106697 10.5397727,19.2464223 C11.3901998,19.0295165 11.9811006,18.267509 11.9715909,17.3999937 C11.9175,11.842184 16.4637455,6.39999371 22.9090909,6.39999371 Z" id="weather-icon__cloud" fill="#000000" fill-rule="nonzero"></path>
                            <ellipse id="weather-icon__shadow" fill="#D8D8D8" cx="28" cy="64.2285714" rx="28" ry="3.77142857"></ellipse>
                        </g>
                    </g>
                </g>
            </svg>
            <h3 class="weather__title mt3 mb3">Hämtar väderinformation</h3>
            <p class="weather__p">Vi hämtar väderinformation för att ge så relevanta tips som möjligt. Det bör bara ta några sekunder.</p>
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
                                <svg class="icon read-more__icon">
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
                                <svg class="icon read-more__icon">
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
                                <svg class="icon read-more__icon">
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
                        var imgUrl = response.data.media_details.sizes["vh_medium_square@2x"].source_url;
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
