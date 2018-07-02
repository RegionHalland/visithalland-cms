<i18n>
  {
    "en": {
      "buttonTxt": "Get started",
      "introTxt": "A day in Halland helps you find interesting spots."
    },
    "sv": {
      "buttonTxt": "Starta nu",
      "introTxt": "A day in Halland hjälper dig hitta riktigt nice saker att göra när du semestrar och sådär du vet."
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