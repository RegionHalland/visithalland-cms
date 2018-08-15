<section class="support-header bg-blue-light">
    <div class="support-header__inner container col-11 md-col-10 lg-col-10 flex items-center justify-end">
    	@foreach(App::secondaryMenuItems() as $secondary_navigation_item)
        	<a class="support-header__link rift-font text-sm text-light ml3" href="{{ $secondary_navigation_item->url }}">{{ $secondary_navigation_item->title }}</a>
        @endforeach 
        @if(is_array($non_active_langs))
            @foreach ($non_active_langs as $key => $lang)
            	<a class="support-header__link rift-font text-sm text-light ml3" href="{{ $lang["url"] }}">{{ $lang["native_name"] }}</a>
            @endforeach
        @endif
    </div>
</section>