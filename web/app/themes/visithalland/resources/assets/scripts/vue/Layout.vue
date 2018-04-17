<template>
    <div class="card">
        <header class="card__header">
            <button class="card__button">
                Gå bakåt
            </button>

            <h2 class="card__title">{{ this.$route.meta.title }}</h2>
        </header>

        <router-view></router-view>
    </div>

</template>

<script>
    export default {
        created() {
            console.log(this.$route)
            console.log("FEEL THE LAYPUT POAWWW")
        }
    }
</script>
