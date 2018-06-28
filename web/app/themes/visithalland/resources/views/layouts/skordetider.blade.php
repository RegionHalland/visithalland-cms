<!doctype html>
<html @php(language_attributes())>
	@include('partials.head')
	<body @php(body_class())>

	<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC8VK82"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<link href="https://fonts.googleapis.com/css?family=La+Belle+Aurore" rel="stylesheet">

	@include('partials.st-header')

	<div role="document">
		<main role="main" class="" id="main-content">
			@yield('content')
		</main>
	</div>

	@php(do_action('get_footer'))
	@include('partials.footer')
	@php(wp_footer())

	</body>
</html>