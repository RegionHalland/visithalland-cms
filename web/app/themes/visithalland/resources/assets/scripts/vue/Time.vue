<i18n>
    {
        "en": {
            "today": "Today",
            "tomorrow": "Tomorrow",
            "dayAfterTomorrow": "Day after tomorrow",
            "choose": "Choose alternative"
        },
        "sv": {
            "today": "Idag",
            "tomorrow": "Imorgon",
            "dayAfterTomorrow": "I övermorgon",
            "choose": "Välj alternativ"
        }
  }
</i18n>

<template>
	<div class="card">
        <Navigation prev-route="location"></Navigation>
        <div class="card__content px3">
            <router-link v-for="date in dates" :key="date.id" :to="{name: 'activities', params: { input: {date: dates[date.id].date, userLocation: input.userLocation} }}">
                <div class="date coastal-living">
                    <div class="date-badge date-badge--large inline-block">
                        <span class="date-badge__day">{{date.day}}</span>
                        <span class="date-badge__month">{{date.month}}</span>
                    </div>
                    <div class="date__content inline-block">
                        <h2 class="date__title mt0 p0">{{date.title}}</h2>
                        <div class="read-more mt1">
                            <span class="read-more__text">
                               {{ $t('choose') }}
                            </span>
                            <div class="read-more__button">
                                <svg class="read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>
        </div>
	</div>
</template>

<script>
import { format, addDays } from 'date-fns';
    export default {
        props: [ "input" ],
        data() {
            return {
                dates: [],
                today: new Date(),
                days: []
            }
        },
        created() {
            // Require date locale
            var dateLocale = require('date-fns/locale/sv')
            if(this.$i18n.i18next.language !== "sv"){
                dateLocale = require('date-fns/locale/en')
            }
            this.days = [
                this.$t('today'),
                this.$t('tomorrow'),
                this.$t('dayAfterTomorrow')
            ]
            // If we are missing user input redirect the user back to the first page
            if(!this.input) return this.$router.push({ name: "location"})

            this.dates = this.days.map((item, index) => {
                return {
                    id: index,
                    title: item,
                    date: addDays(this.today, index),
                    month: format(addDays(this.today, index), 'MMM', {locale: dateLocale}),
                    day: format(addDays(this.today, index), 'DD'),
                };
            });
            console.log(format(this.dates[2].date))
        }
    }
</script>
