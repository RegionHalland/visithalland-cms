<i18n>
    {
        "en": {
            "goBack": "Go back",
            "location": "Location",
            "time": "When to you want to do something?",
            "activities": "What are you interested in?",
            "results": "Our recommendations"
        },
        "sv": {
            "goBack": "Gå bakåt",
            "location": "Platsinformation",
            "time": "När vill du göra något?",
            "activities": "Vad är du intresserad av?",
            "results": "Våra rekommendationer"
        }
  }
</i18n>

<template>
    <header class="card__header topographic-pattern">
        <button class="card__button" v-on:click="goBack()">
            <svg class="read-more__icon mr1">
                <use xlink:href="#arrow-left-icon"/>
            </svg>
            {{ $t('goBack') }}
        </button>
        <h2 class="card__title">{{ $t(this.$route.meta.title) }}</h2>
    </header>
</template>

<script>
    export default {
        props: ["input", "prev-route"],
        name: "Navigation",
        methods: {
            goBack() {
                this.$router.push({ name: this.prevRoute, params: {input: this.input }})
            }
        }
    }
</script>
