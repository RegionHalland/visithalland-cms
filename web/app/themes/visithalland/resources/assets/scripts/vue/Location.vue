<i18n>
    {
        "en": {
            "title": "About location services",
            "paragraph": "If you allow us to access your current location we can give you more relevant information.",
            "allowBtn": "Allow acces to my location",
            "continueWithoutLocationButton": "Continue without using my location"
        },
        "sv": {
            "title": "Om platstjänster",
            "paragraph": "Med din platsinformation kan vi ge bättre tips baserat på väder och avstånd.",
            "allowBtn": "Tillåt platstjänster",
            "continueWithoutLocationButton": "Gå vidare utan plats"
        }
  }
</i18n>

<template>
    <div class="card">
        <Navigation prev-route="home"></Navigation>
        <div class="card__content center flex justify-center align-center flex-column px3">
            <h3 class="mt3 mb3">{{ $t('title') }}</h3>
            <p class="mb4">{{ $t('paragraph') }}</p>
            <button class="btn center mx-auto" :class="{ loading: loading }" v-on:click="askForLocation()">
                {{ $t('allowBtn') }}
            </button>
            <router-link @click.native="gaTrack()" :to="{name: 'time', params: {input: {userLocation: {lat: 56.973735, lng: 12.582737}}}}">
                <div class="read-more mt3">
                    <span class="read-more__text">
                        {{ $t('continueWithoutLocationButton') }}
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
            gaTrack() {
                this.$ga.event({
                    eventCategory: 'Button',
                    eventAction: 'Användning av platsinformation',
                    eventLabel: 'Blockera'
                })
            },
            askForLocation () {
                this.loading = true;
                this.$getLocation()
                    .then(coordinates => {
                        // TODO: Send to analytics and our location api
                        this.loading = false;
                        this.$ga.event({
                            eventCategory: 'Button',
                            eventAction: 'Användning av platsinformation',
                            eventLabel: 'Tillåt'
                        })
                        return this.$router.push({ name: "time", params: {input: {userLocation: {lat: coordinates.lat, lng: coordinates.lng }} }});
                    });
            }
        }
    }
</script>
