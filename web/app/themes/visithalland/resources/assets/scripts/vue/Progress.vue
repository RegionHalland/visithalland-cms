<template>
  <div>
    <div class="offline-bar" v-if="!isOffLine">
        <div class="offline-bar__inner">Ingen internetanslutning</div>
    </div>

    <transition>
        <router-view></router-view>
    </transition>

    <div class="progress-bar mx-auto" style="z-index: 9;">
        <span class="progress-bar__indicator" :style="{ width: (100/6) * this.currentRouteCount + '%'}"></span>
    </div>
  </div>
</template>

<script>
    export default {
        props: ["input"],
        data () {
            return {
                currentRouteCount: 1
            }
        },
        created () {
            console.log(this.$router.history.current.meta.order);
        },
        beforeRouteUpdate (to, from, next) {
            console.log(to.meta.order);
            this.currentRouteCount = to.meta.order

            next();
        }
    }
</script>
