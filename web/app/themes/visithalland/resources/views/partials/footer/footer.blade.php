<footer class="bg-blue topographic-pattern pt-16">
	<div class="relative">
	    <div class="container w-11/12 lg:w-10/12 mx-auto pb-8">
	        <div class="flex flex-wrap -mx-3">
	            @include('partials.footer.footer-info')
	            @include('partials.footer.footer-navigation')
	        </div>
	    </div>
    </div>
    @include('partials.footer.footer-eu')
    @include('partials.footer.footer-cookie')
</footer>

<?php wp_footer(); ?>

</body>
</html>
