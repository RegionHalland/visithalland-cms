
<template>
    <div class="card">
	    <Navigation :input="input" prev-route="time"></Navigation>
	    <div class="card__content">
            <div v-if="loading">
                <h1>Loading...</h1>
            </div>

            <router-link v-if="activities && activities.length" class="block mb3" v-for="activity in activities" :key="activity.id" :to="{name: 'results', params: {input: {date: input.date, activity: activity}}}">
                <div class="activity inline-flex hiking-biking">
                    <img src="" class="activity__img mr2" />
                    <div class="activity__content">
                        <h2 class="activity__title">{{ activity.title.rendered }}</h2>
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
            </router-link>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
    export default {
        props: [ "input" ],
        data: function(){
            return {
                loading: true,
                activities: []
            }
        },
        created () {
            this.fetchData()
        },
        methods: {
            fetchData () {
                var vm = this;
                // Make a request for a user with a given ID
                axios.get('/wp-json/wp/v2/activity')
                    .then(function (response) {
                        console.log(response.data);
                        // TODO: fetch images
                        vm.activities = response.data;
                        vm.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                        vm.loading = false;
                    });
            }
        }
    }
</script>
