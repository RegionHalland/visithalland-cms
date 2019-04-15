<footer class="bg-blue topographic-pattern pt-16">
	<div class="relative">
	    <div class="container w-11/12 lg:w-10/12 mx-auto pb-8">
	        <div class="flex flex-wrap -mx-3">
	        	{{-- Gets Blog Info --}}
	            @include('partials.footer.footer-info')
	            {{-- Gets Navigation Items Primary and Secondary Menu --}}
	            @include('partials.footer.footer-navigation')
	        </div>
	    </div>
    </div>
    {{-- Footer Secondary Start --}}
    	@include('partials.footer.footer-secondary')
    {{-- Footer Secondary End --}}
    {{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
    {{-- Cookie Notice --}}
    @include('partials.footer.footer-cookie')
    {{-- Cookie Notice End --}}
</footer>

<?php wp_footer(); ?>

</body>
</html>
