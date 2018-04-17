<template>
	<div class="card">
	  <div class="card__content">
            <div class="date coastal-living">
                <div class="date-badge date-badge--large inline-block">
                    <span class="date-badge__day">22</span>
                    <span class="date-badge__month">Mar</span>
                </div>
                <div class="date__content inline-block">
                    <h2 class="date__title mt0 p0">Idag</h2>
                    <div class="read-more mt1">
                        <span class="read-more__text">
                            <router-link :to="{
                                name: 'activities', params: { date: new Date() }
                            }">Välj alternativ</router-link>
                        </span>
                        <div class="read-more__button">
                            <svg class="icon read-more__icon">
                                <use xlink:href="#arrow-right-icon"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
	  </div>
	</div>
</template>

<script>
import { format, formatDistance, formatRelative, subDays, distanceInWords, addDays } from 'date-fns';
import sv from 'date-fns/locale/sv';
import en from 'date-fns/locale/en';

    export default {
        props: [
            "date"
        ],
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
