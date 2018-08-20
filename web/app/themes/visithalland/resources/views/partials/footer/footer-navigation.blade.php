@php
    $navbar_items = App::get_navbar_items();
@endphp

<div class="col col-12 mb5 px3">
    @foreach($navbar_items as $primary_navigation_item)
        @if(is_array($primary_navigation_item->children))
            <div class="col col-12 sm-col-4 md-col-6 mt4">
                <h4 class="text-light mb3 text-lg">{{ $primary_navigation_item->post_title }}</h4>
                @foreach($primary_navigation_item->children as $child)
                    <div class="col col-12 md-col-6">
                        <div class="truncate text-light rift-font pb3">
                            <a class="text-light bold text-lg truncate" href="{{ $child->url }}">
                                <div class="theme-icon {{$child->meta_fields["class_name"] ? $child->meta_fields["class_name"] : "coastal-living"}}">
                                    <div class="theme-icon__inner">
                                    </div>
                                </div>
                                <span class="ml2">{{ $child->post_title }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endforeach


    <div class="col col-12 sm-col-4 md-col-3 mt4">
        <h4 class="text-light mb3 text-lg">
            @php 
                _e('Sidor', 'visithalland') 
            @endphp
        </h4>
        @foreach($navbar_items as $test)
            @if(!is_array($test->children))
                <a href="{{ $test->url }}" class="rift-font bold text-grey-light mb3 block">{{ $test->title }}</a>
            @endif
        @endforeach
    </div>

    <div class="col col-12 sm-col-4 md-col-3 mt4">
        <h4 class="text-light mb3 text-lg">
            @php 
                _e('Om webbplatsen', 'visithalland') 
            @endphp
        </h4>
        @foreach(App::secondaryMenuItems() as $secondary_navigation_item)
            <a class="rift-font text-grey-light bold mb3 block" href="{{ $secondary_navigation_item->url }}">{{ $secondary_navigation_item->title }}</a>
        @endforeach 
        @if(is_array($non_active_langs))
            @foreach ($non_active_langs as $key => $lang)
                <a class="rift-font text-grey-light bold mb3 block" href="{{ $lang["url"] }}">{{ $lang["native_name"] }}</a>
            @endforeach
        @endif
    </div>
</div>