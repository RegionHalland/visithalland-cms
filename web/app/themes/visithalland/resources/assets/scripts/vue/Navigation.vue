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
    <header class="bg-blue py-3 px-3 topographic-pattern">
        <button class="inline-flex outline-none focus:outline-none items-center" v-on:click="goBack()">
            <span class="h-6 w-6 rounded-full bg-blue-light flex items-center justify-center mr-2">
                <svg class="read-more__icon">
                    <use xlink:href="#arrow-left-icon"/>
                </svg>
            </span>
            <span class="font-rift text-white">
                {{ $t('goBack') }}
            </span>
        </button>
        <h2 class="text-xl text-white mt-2">{{ $t(this.$route.meta.title) }}</h2>
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
