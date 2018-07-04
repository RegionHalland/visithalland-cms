<i18n>
  {
    "en": {
      "buttonTxt": "Get started",
      "introTxt": "A day in Halland is your guide to discover Hallands best kept secrets."
    },
    "sv": {
      "buttonTxt": "Starta nu",
      "introTxt": "A day in Halland tipsar om saker du kan göra och uppleva - små guldkorn och hemliga favoriter. I Halland är det alltid värt att stanna en dag till."
    }
  }
</i18n>

<template>
    <div class="dh-intro center">
        <h1 class="light">A Day in Halland</h1>
        <p class="light my3">{{ $t('introTxt') }}</p>
        <router-link class="btn block center btn--primary dh-button" to="location">{{ $t('buttonTxt') }}</router-link>

        <CookieNotice />
    </div>
</template>

<script>
    export default {
        props: ["input"]
    }
</script>