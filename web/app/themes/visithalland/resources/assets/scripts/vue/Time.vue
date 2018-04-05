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
    module.exports = {
        data: function(){
            return {
                title: "När vill du göra något?"
            }
        }
    }
</script>
