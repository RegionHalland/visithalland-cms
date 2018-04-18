<template>
	<div class="card">
	  <Navigation :input="input" prev-route="activities"></Navigation>
	  <div class="card__content">

        <div v-if="loading">
            <h1>Loading...</h1>
        </div>

	  	<header class="result-header">
	  		Nära dig
	  	</header>
		<a href="" class="block mb3">
			<div class="result inline-flex hiking-biking">
			    <img src="" class="result__img mr2" />
			    <div class="result__content">
			        <h2 class="result__title">Semestra med Allemansrätten</h2>
			        <div class="read-more mt1">
			            <span class="read-more__text">
			                Välj alternativ
			            </span>
			            <div class="read-more__button">
			                <svg class="icon read-more__icon">
			                    <use xlink:href="#arrow-right-icon"/>
			                </svg>
			            </div>
			        </div>

			    </div>
			</div>
		</a>

	  </div>
	</div>
</template>

<script>
    export default {
        props: [ "input" ],
        data: function(){
            return {
                loading: true
            }
        },
        created() {
            console.log("user input", this.input)
        }
    }
</script>
