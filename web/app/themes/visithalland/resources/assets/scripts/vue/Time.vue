<template>
	<div class="card">
    <Navigation prev-route="home"></Navigation>
    <div class="card__content">

        <div v-for="date in dates" :key="date.id" class="date coastal-living pt3">
            <div class="date-badge date-badge--large inline-block">
                <span class="date-badge__day">{{date.day}}</span>
                <span class="date-badge__month">{{date.month}}</span>
            </div>
            <div class="date__content inline-block">
                <h2 class="date__title mt0 p0">{{date.title}}</h2>
                <div class="read-more mt1">
                    <span class="read-more__text">
                        <router-link :to="{name: 'activities', params: { input: {date: dates[date.id].date, userLocation: input.userLocation} }}">Välj alternativ</router-link>
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
            console.log("loc", this.input);
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
