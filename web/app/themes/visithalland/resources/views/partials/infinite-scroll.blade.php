<div class="next-post-link">
    <div id="nextPages" data-all='{{ json_encode(App::getNextPostLink()) }}'></div>
</div>

<div class="page-load-status topographic-pattern">
    <div class="col-11 md-col-10 lg-col-10 mx-auto">
        <div class="infinite-scroll-request relative">
        	<div class="next-article clearfix">
    			<div class="next-article__img-container inline-block">
    				<img class="next-article__img" src="" alt="">
    			</div>
        		<div class="next-article__content inline-block">
        			<span class="next-article__heading h5 light">Nästa artikel</span>
        			<h3 class="next-article__title light"></h3>
        		</div>
        	</div>
        	<div class="loading-indicator">
	            <svg class="loading-indicator__icon">
	                <use xlink:href="#arrow-down-icon"/>
	            </svg>
	        </div>
        </div>
        <p class="infinite-scroll-last">End of content</p>
  		<p class="infinite-scroll-error">No more pages to load</p>

    </div>
</div>
