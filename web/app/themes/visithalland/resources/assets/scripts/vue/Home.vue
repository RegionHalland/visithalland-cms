<i18n>
  {
    "en": {
      "buttonTxt": "Get started"
    },
    "sv": {
      "buttonTxt": "Få inspiration"
    }
  }
</i18n>

<template>
    <div>
        <router-link class="btn block center btn--primary" to="location">{{ $t('buttonTxt') }}</router-link>

        <CookieNotice />
    </div>
</template>

<script>
    export default {
        props: ["input"]
    }
</script>