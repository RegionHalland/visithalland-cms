<section class="bg-blue-light box-shadow z4 relative">
    <div class="container col-11 md-col-10 lg-col-10 flex items-center justify-end height-3 relative">
    	@foreach(App::secondaryMenuItems() as $secondary_navigation_item)
        	<a class="rift-font text-sm text-grey hover ml3" href="{{ $secondary_navigation_item->url }}">{{ $secondary_navigation_item->title }}</a>
        @endforeach 
        @if(is_array($non_active_langs))
            @foreach ($non_active_langs as $key => $lang)
            	<a class="rift-font text-sm text-grey hover ml3" href="{{ $lang["url"] }}">{{ $lang["native_name"] }}</a>
            @endforeach
        @endif
    </div>
</section>