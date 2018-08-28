<nav class="nav w-fill items-center md-justify-end md-flex-1 flex height-5 md-pr3">
    <ul class="w-fill flex justify-between sm-justify-start lg-justify-end">
        @foreach(App::getPrimaryNavigationItems() as $primary_navigation_item)
            @if(is_array($primary_navigation_item->children))
            <li class="sm-mr4 md-ml2 md-mr0 lg-ml4">
                <button id="dropdown-button" class="has-dropdown hover rift-font outline-none text-light inline-flex items-center nowrap text-base bold" aria-haspopup="true" aria-expanded="false">
                    <span>{!! $primary_navigation_item->post_title !!}</span>
                    <span class="height-2 width-2 inline-flex justify-center items-center bg-blue-xlight rounded-full ml2">
                        <svg class="icon--sm">
                            <use xlink:href="#arrow-down-icon"/>
                        </svg>
                    </span>
                </button>
                @include('partials.header.navigation-dropdown')
            </li>
            @else
                <li class="sm-mr4 md-ml2 md-mr0 lg-ml4">
                    <a href="{{$primary_navigation_item->url}}" class="outline-none hover rift-font text-light inline-flex items-center nowrap text-base bold">
                        <span>{!! $primary_navigation_item->post_title ? $primary_navigation_item->post_title : $primary_navigation_item->title !!}</span>
                        <span class="height-2 width-2 inline-flex justify-center items-center bg-blue-xlight rounded-full ml2">
                            <svg class="icon--sm">
                                <use xlink:href="#arrow-right-icon"/>
                            </svg>
                        </span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>



