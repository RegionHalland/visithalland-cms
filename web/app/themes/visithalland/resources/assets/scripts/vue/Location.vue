<template>
<div>
    <button class="btn block center btn--primary" :class="{ loading: loading }" v-on:click="askForLocation()">Ja ni får använda min plats</button>

    <router-link :to="{name: 'time', params: {input: {userLocation: {lat: 56.973735, lng: 12.582737}}}}">Gå vidare utan plats</router-link>
</div>
</template>

<script>
    export default {
        props: ["input"],
        data: () => {
            return {
                loading: false
            }
        },
        methods: {
            askForLocation () {
                this.loading = true;
                this.$getLocation()
                    .then(coordinates => {
                        console.log(coordinates);
                        // TODO: replace object below with coordinates var
                        this.loading = false;
                        return this.$router.push({ name: "time", params: {input: {userLocation: {lat: coordinates.lat, lng: coordinates.lng }} }});
                    });
            }
        }
    }
</script>
