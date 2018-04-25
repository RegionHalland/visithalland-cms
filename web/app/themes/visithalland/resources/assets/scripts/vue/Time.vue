<template>
	<div class="card">
    <Navigation prev-route="location"></Navigation>
    <div class="card__content">
        
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
                            Välj alternativ
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
                days: ['Idag', 'Imorgon', 'I övermorgon']
            }
        },
        created() {
            // If we are missing user input redirect the user back to the first page
            if(!this.input) return this.$router.push({ name: "location"})

            this.dates = this.days.map((item, index) => {
                return {
                    id: index,
                    title: item,
                    date: addDays(this.today, index),
                    month: format(addDays(this.today, index), 'MMM'),
                    day: format(addDays(this.today, index), 'DD'),
                };
            });
            console.log(format(this.dates[2].date))
        }
    }
</script>
