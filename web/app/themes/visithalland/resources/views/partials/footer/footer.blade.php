<footer class="footer bg-blue topographic-pattern pt-16">
	<div class="relative">
	    <div class="container w-11/12  md:w-10/12  lg:w-10/12  mx-auto">
	        <div class="clearfix  -mx-3">
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
