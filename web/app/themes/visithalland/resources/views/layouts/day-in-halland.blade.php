<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
    <body @php(body_class())>

	<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KC8VK82"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<div role="document">
		<main role="main" id="main-content">
			@yield('content')
        </main>
    </div>

    <script src="{{\App\asset_path('scripts/vue.js')}}"></script>
	</body>
</html>
