<template>
<div>
    <button class="btn block center btn--primary" v-on:click="askForLocation()">Ja ni får använda min plats</button>
    <router-link :to="{name: 'results', params: {input: {userLocation: {lat: 2323, lng: 231312}}}}"></router-link>
</div>
</template>

<script>
    export default {
        props: ["input"],
        methods: {
            askForLocation () {
                //var vm = this;
                //return this.$router.push({ name: "time", params: {input: {userLocation: {lat: "56.6689603", lng: "12.8567978" }} }});

                this.$getLocation()
                    .then(coordinates => {
                        console.log(coordinates);
                        // TODO: replace object below with coordinates var
                        return this.$router.push({ name: "time", params: {input: {userLocation: {lat: coordinates.lat, lng: coordinates.lng }} }});
                    });
            }
        }
    }
</script>
