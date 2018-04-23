<template>
    <button class="btn block center btn--primary" v-on:click="askForLocation()">Ja ni får använda min plats</button>
</template>

<script>
    export default {
        props: ["input"],
        created() {

        },
        methods: {
            askForLocation () {
                var vm = this;
                console.log("askme");
                return this.$router.push({ name: "time", params: {input: {userLocation: {lat: "56.6689603", lng: "12.8567978" }} }});

                this.$getLocation()
                    .then(coordinates => {
                        console.log(coordinates);
                        // TODO: replace object below with coordinates var
                        //return this.$router.push({ name: "time", params: {input: {userLocation: {lat: "56.6689603", lng: "12.8567978" }} }});
                    });
            }
        }
    }
</script>
