@php
    $navbar_items = App::getPrimaryNavigationItems();
@endphp

<div class="col col-12 mb5 px3">
    @foreach($navbar_items as $primary_navigation_item)
        @if(is_array($primary_navigation_item->children))
            <div class="col col-12 sm-col-12 md-col-6 mt4">
                <h4 class="text-light mb3 text-lg">{{ $primary_navigation_item->post_title }}</h4>
                @foreach($primary_navigation_item->children as $child)
                    @if($child->type === 'taxonomy')
                        <div class="truncate text-light rift-font col col-12 sm-col-4 md-col-6 pb3">
                            <a class="text-light bold text-lg truncate inline-block" href="{{ $child->url }}">
                                <div class="theme-icon {{$child->meta_fields["class_name"] ? $child->meta_fields["class_name"] : "coastal-living"}}">
                                    <div class="theme-icon__inner">
                                    </div>
                                </div>
                                <span class="ml2">{{ $child->post_title }}</span>
                            </a>
                        </div>
                    @else 
                        <div class="truncate text-light rift-font col col-12 sm-col-4 md-col-6 pb3">
                            <a class="text-light bold text-lg truncate inline-block" href="{{ $child->url }}">
                                <div class="theme-icon coastal-living">
                                    <div class="theme-icon__inner">
                                    </div>
                                </div>
                                <span class="ml2">{{ $child->title }}</span>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach
    <div class="col col-12 sm-col-6 md-col-3 mt4">
        <h4 class="text-light mb3 text-lg">
            @php 
                _e('Sidor', 'visithalland') 
            @endphp
        </h4>
        @foreach($navbar_items as $primary_navigation_item)
            @if(!is_array($primary_navigation_item->children))
                <a href="{{ $primary_navigation_item->url }}" class="rift-font bold text-grey hover mb3 block">{!! $primary_navigation_item->title !!}</a>
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
            <a class="rift-font text-grey hover bold mb3 block" href="{{ $secondary_navigation_item->url }}">{!! $secondary_navigation_item->title !!}</a>
        @endforeach 
        @if(is_array($non_active_langs))
            @foreach ($non_active_langs as $key => $lang)
                <a class="rift-font text-grey hover bold mb3 block" href="{{ $lang["url"] }}">{{ $lang["native_name"] }}</a>
            @endforeach
        @endif
    </div>
</div>