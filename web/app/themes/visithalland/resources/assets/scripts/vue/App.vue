<template>
    <div class="app-container p-3 z-40 absolute pin-l pin-r pin-b flex flex-col justify-end h-full">
        <transition name="fade">
            <div class="py-3 absolute bg-orange z-50 pin-b pin-l pin-r" v-if="isOffLine">
                <div class="container w-11/12 lg:w-10/12 mx-auto font-rift text-center">Ingen internetanslutning</div>
            </div>
        </transition>
        <transition name="fade">
            <router-view></router-view>
        </transition>
        <cookie-notice />
    </div>
</template>

<script>
    export default {
      props: ["input"]
    }
</script>