<template>
    <header class="card__header">
        <button class="card__button" v-on:click="goBack()">
            Gå bakåt
        </button>
        <h2 class="card__title">{{ this.$route.meta.title }}</h2>
    </header>
</template>

<script>
    export default {
        name: "Navigation",
        methods: {
            goBack() {
                console.log(this.$router.go(-1))
            }
        }
    }
</script>
