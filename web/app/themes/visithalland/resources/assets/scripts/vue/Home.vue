<i18n>
  {
    "en": {
      "buttonTxt": "Get started",
      "introTxt": "A day in Halland is your guide to discover Hallands best kept secrets."
    },
    "sv": {
      "buttonTxt": "Få tips nu",
      "introTxt": "A day in Halland tipsar om saker du kan göra och uppleva - små guldkorn och hemliga favoriter. I Halland är det alltid värt att stanna en dag till."
    }
  }
</i18n>

<template>
    <div class="flex h-full justify-center flex-col text-center px-3 w-11/12 md:w-6/12 lg:w-4/12 mx-auto">
        <h1 class="text-white font-rift">A Day in Halland</h1>
        <p class="my-3 text-white font-fira">{{ $t('introTxt') }}</p>
        <router-link class="px-3 mx-auto py-2 bg-blue topographic-pattern-dark rounded items-center inline-flex mt-3" to="location">
          <span class="font-rift m-2 font-bold text-base text-center w-full text-white">{{ $t('buttonTxt') }}</span>
        </router-link>
    </div>
</template>

<script>
    export default {
      props: ["input"]
    }
</script>