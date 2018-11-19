<section class="bg-blue-light shadow z-40 relative">
    <div class="container w-11/12 lg:w-10/12  flex items-center justify-end h-6 relative">
        @if(is_array(App::secondaryMenuItems()))
        	@foreach(App::secondaryMenuItems() as $secondary_navigation_item)
            	<a class="font-rift text-sm text-grey hover ml-3" href="{{ $secondary_navigation_item->url }}">{{ $secondary_navigation_item->title }}</a>
            @endforeach
        @endif
        @if(is_array($non_active_langs))
            @foreach ($non_active_langs as $key => $lang)
            	<a class="font-rift text-sm text-grey hover ml-3" href="{{ $lang["url"] }}">{{ $lang["native_name"] }}</a>
            @endforeach
        @endif
    </div>
</section>