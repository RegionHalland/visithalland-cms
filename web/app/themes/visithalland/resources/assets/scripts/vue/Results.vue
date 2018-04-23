<template>
	<div class="card">
	  <Navigation :input="input" prev-route="activities"></Navigation>
	  <div class="card__content">

        <div v-if="loading">
            <h1>Loading...</h1>
        </div>

        <div v-if="nearYouArray && nearYouArray.length && input">
            <header class="result-header">
                Nära dig
            </header>
            <a :href="nearYou.link" class="block mb3" v-for="nearYou in nearYouArray" :key="nearYou.id">
                <div class="result inline-flex hiking-biking">
                    <img :src="nearYou.imgUrl" class="result__img mr2" />
                    <div class="result__content">
                        <h2 class="result__title">{{nearYou.title.rendered}}</h2>
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
                        <h2 class="result__title">{{happening.title.rendered}}</h2>
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
                        <h2 class="result__title">{{link.title.rendered}}</h2>
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
            if(!this.input) return this.$router.push({ name: "activities"})
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

                        /*vm.nearYouArray.map((element, index) => {
                            return vm.fetchImage(index, element.featured_media, "nearYouArray")
                        })

                        vm.happeningsArray.map((element, index) => {
                            return vm.fetchImage(index, element.featured_media, "happeningsArray")
                        })*/

                        /*vm.allArray.map( (element) => {
                            return element.imgUrl = vm.fetchImage(element.featured_media);
                        })*/

                        /*var results = await Promise.all(vm.allArray.map(async (item) => {
                            return await vm.fetchImage(element.featured_media);
                        }));*/

                        // Map input data to an Array of Promises
                        /*let promises = vm.allArray.map(element => {
                        return vm.fetchImage(element.featured_media)
                            .then(imgUrl => {
                                element.imgUrl = imgUrl;
                                return element;
                            })
                        });*/

                        Promise.all(vm.allArray.map( (record, index) => {
                            return axios.get('/wp-json/wp/v2/media/'+record.featured_media);
                        })).then(response => {
                            //dispatch({ type: FETCH_GALLERIES_SUCCESS, payload: galleries });
                            console.log("resp NEWW", response.data);
                        });


                        /*vm.fetchImage(4789).then((result) => {
                            console.log("my image", result);
                        })*/

                        //vm.$forceUpdate()

                        console.log("mapme", vm.allArray);

                        vm.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                        vm.loading = false;
                    });
            },
            fetchImage(imageId){
                var vm = this;
                axios.get('/wp-json/wp/v2/media/'+imageId)
                    .then(function (response) {
                        var imgUrl = response.data.media_details.sizes["vh_medium_square@2x"].source_url;
                        console.log("aj", response)
                        return imgUrl;

                        // TODO: This should not be needed
                        //vm.$forceUpdate()
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>
