<div class="next-post-link">
    <div id="nextPages" data-all='{{ json_encode(App::getNextPostLink()) }}'></div>
</div>

<div class="container">
    <div class="page-load-status">
        <div class="infinite-scroll-request">
        	 <svg class="infinite-scroll-request__icon">
                <use xlink:href="#arrow-down-icon"/>
            </svg>
        </div>
        <p class="infinite-scroll-last">End of content</p>
  		<p class="infinite-scroll-error">No more pages to load</p>
        
    </div>
</div>
