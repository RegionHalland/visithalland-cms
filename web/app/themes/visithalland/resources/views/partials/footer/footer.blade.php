<footer class="footer bg-blue topographic-pattern pt5">
	<div class="relative">
	    <div class="container col-11 md-col-10 lg-col-10 mx-auto">
	        <div class="clearfix mxn3">
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
