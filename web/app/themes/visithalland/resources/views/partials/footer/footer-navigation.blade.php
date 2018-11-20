@php
    $navbar_items = App::getPrimaryNavigationItems();
@endphp

<div class="flex flex-wrap w-full px-3">
    @foreach($navbar_items as $primary_navigation_item)
        @if(is_array($primary_navigation_item->children))
            <div class=" w-full sm:w-full lg:w-6/12 mb-8">
                <h4 class="text-white mb-4 text-lg">{{ $primary_navigation_item->post_title }}</h4>
                <div class="flex flex-wrap">
                    @foreach($primary_navigation_item->children as $child)
                        <div class="truncate text-white font-rift w-full sm:w-4/12 lg:w-6/12  pb-3">
                            @include(
                                'partials.components.theme-link', [
                                'title' => $child->post_title ? $child->post_title : $child->title, 
                                'url' => $child->url, 
                                'theme' => isset($child->meta_fields["class_name"]) && !empty($child->meta_fields["class_name"]) ? $child->meta_fields["class_name"] : "visithalland"
                                ]
                            )
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach
    <div class=" w-full sm:w-6/12 lg:w-3/12 mb-8">
        <h4 class="text-white mb-4 text-lg">
            @php 
                _e('Sidor', 'visithalland') 
            @endphp
        </h4>
        @if(is_array($navbar_items))
            @foreach($navbar_items as $primary_navigation_item)
                @if(!is_array($primary_navigation_item->children))
                    <a href="{{ $primary_navigation_item->url }}" class="font-rift font-bold text-grey opacity-75 hover:opacity-100 hover:underline focus:underline focus:opacity-100 mb-3 block">{!! $primary_navigation_item->title !!}</a>
                @endif
            @endforeach
        @endif
    </div>
    <div class=" w-full sm:w-4/12 lg:w-3/12 mb-8">
        <h4 class="text-white mb-4 text-lg">
            @php 
                _e('Om webbplatsen', 'visithalland') 
            @endphp
        </h4>
        @if(is_array(App::secondaryMenuItems()))
            @foreach(App::secondaryMenuItems() as $secondary_navigation_item)
                <a class="font-rift text-grey opacity-75 hover:opacity-100 focus:opacity-100 hover:underline focus:underline font-bold mb-3 block" href="{{ $secondary_navigation_item->url }}">{!! $secondary_navigation_item->title !!}</a>
            @endforeach
        @endif
        @if(is_array($non_active_langs))
            @foreach ($non_active_langs as $key => $lang)
                <a class="font-rift text-grey opacity-75 hover:opacity-100 hover:underline focus:underline focus:opacity-100 font-bold mb-3 block" href="{{ $lang["url"] }}">{{ $lang["native_name"] }}</a>
            @endforeach
        @endif
    </div>
</div>