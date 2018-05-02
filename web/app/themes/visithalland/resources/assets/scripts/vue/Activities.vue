<i18n>
    {
        "en": {
            "choose": "Choose alternative"
        },
        "sv": {
            "choose": "Välj alternativ"
        }
  }
</i18n>

<template>
    <div class="card">
	    <Navigation :input="input" prev-route="time"></Navigation>
	    <div class="card__content px3">
            <div v-if="loading" class="block mb3">
                <Shimmer :loading="loading"></Shimmer>
            </div>

            <router-link v-if="activities && activities.length && input" class="block mb3" v-for="activity in activities" :key="activity.id" :to="{name: 'results', params: {input: {date: input.date, activity: activity, userLocation: input.userLocation}}}">
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
</template>

<script>
import axios from 'axios';
    export default {
        props: [ "input" ],
        data () {
            return {
                loading: true,
                activities: [],
                currentLang: ''
            }
        },
        created () {
            // If we are missing user input redirect the user back to the first page
            if(!this.input) return this.$router.push({ name: "location"})
            this.currentLang = this.$i18n.i18next.language == "sv" ? "" : 'en';
            console.log(this.currentLang);
            // Fetch activities
            this.fetchData()
        },
        methods: {
            fetchData () {
                var vm = this;
                // Fetch all activites
                // TODO: add ?lang=en here
                axios.get('/wp-json/visit/v1/activities?lang=' + this.currentLang)
                    .then(function (response) {
                        vm.activities = response.data;
                        vm.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                        vm.loading = false;
                    });
            },
            fetchImage(activityIndex, imageId){
                var vm = this;
                axios.get('/wp-json/wp/v2/media/'+imageId)
                    .then(function (response) {
                        var imgUrl = response.data.media_details.sizes["vh_thumbnail"].source_url;
                        vm.activities[activityIndex].imgUrl = imgUrl;

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
