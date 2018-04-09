<template>
	<div class="card">
	  <header class="card__header">
	     <button class="card__button">
	       Gå bakåt
	     </button>
	     <h2 class="card__title">{{ title }}</h2>
	  </header>
	  <div class="card__content">

	  </div>
	</div>
</template>

<script>
import { format, formatDistance, formatRelative, subDays, distanceInWords, addDays } from 'date-fns';
import sv from 'date-fns/locale/sv';
import en from 'date-fns/locale/en';

    export default {
        data(){
            return {
                title: "När vill du göra något?"
            }
        },
        created(){
            var currentLang = window.navigator.language == "sv" ? "sv" : "en";
            console.log(currentLang);
            var today = new Date();
            var tomorrow = addDays(new Date(), 1);
            var dayAfterTomorrow = addDays(new Date(), 2);

            console.log(today, "|", tomorrow, "|", dayAfterTomorrow);



        }
    }
</script>
