<template>
	<div class="card">
	  <header class="card__header">
	     <button class="card__button">
	       Gå bakåt
	     </button>
	     <h2 class="card__title">{{ title }}</h2>
	  </header>
	  <div class="card__content">
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
    module.exports = {
        data: function(){
            return {
                title: "Results"
            }
        }
    }
</script>
