<template>
    <header class="card__header topographic-pattern">
        <button class="card__button" v-on:click="goBack()">
            <svg class="read-more__icon mr1">
                <use xlink:href="#arrow-left-icon"/>
            </svg>
            Gå bakåt
        </button>
        <h2 class="card__title">{{ this.$route.meta.title }}</h2>
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
