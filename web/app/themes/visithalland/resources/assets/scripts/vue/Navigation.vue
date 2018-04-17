<template>
    <header class="card__header">
        <button class="card__button">
        Gå bakåtss
        </button>
        <h2 class="card__title">{{ this.$route.meta.title }}</h2>
    </header>
</template>

<script>
    export default {
        name: "Navigation",
        created(){
            console.log("My nav")
        }
    }
</script>
