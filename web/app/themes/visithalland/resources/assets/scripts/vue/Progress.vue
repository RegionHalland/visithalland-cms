<template>
  <div>
    <div class="offline-bar" v-if="isOffLine">
        <div class="offline-bar__inner">Ingen internetanslutning</div>
    </div>

    <transition :name="transitionName">
        <router-view></router-view>
    </transition>
  </div>
</template>

<script>
    export default {
        props: ["input"],
        data () {
            return {
                currentRouteCount: 1,
                transitionName: ""
            }
        },
        beforeRouteUpdate (to, from, next) {
            this.currentRouteCount = to.meta.order

            const toDepth = to.meta.order || 0;
            const fromDepth = from.meta.order || 0;

            this.transitionName = toDepth >= fromDepth ? 'fade' : 'fade-right';
            next();
        }
    }
</script>
