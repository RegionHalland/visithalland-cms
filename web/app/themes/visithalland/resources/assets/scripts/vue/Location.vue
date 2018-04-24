<template>

<div class="card">
    <Navigation prev-route="home"></Navigation>
    <div class="card__content center flex justify-center align-center flex-column px3">
        <h3 class="weather__title mt3 mb3">Om platstjänster</h3>
        <p class="weather__p mb4">Med din platsinformation kan vi ge bättre tips baserat på väder och avstånd </p>
        <button class="btn center btn--primary mx-auto" :class="{ loading: loading }" v-on:click="askForLocation()">
            Tillåt platstjänster
        </button>
        <router-link :to="{name: 'time', params: {input: {userLocation: {lat: 56.973735, lng: 12.582737}}}}">
            <div class="read-more mt3">
                <span class="read-more__text">
                    Gå vidare utan plats
                </span>
                <div class="read-more__button">
                    <svg class="read-more__icon">
                        <use xlink:href="#arrow-right-icon"/>
                    </svg>
                </div>
            </div>
        </router-link>
    </div>
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
