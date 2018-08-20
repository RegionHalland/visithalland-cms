<nav class="nav fill items-center flex">
    <ul class="nav__ul fill">
        @foreach(App::get_navbar_items() as $primary_navigation_item)
            @if(is_array($primary_navigation_item->children) && count($primary_navigation_item->children) > 0)
            <li class="nav__item">
                <button class="nav__button has-popup hover rift-font text-light inline-flex items-center nowrap text-base bold" aria-haspopup="true" aria-expanded="false">
                    <span>{{ $primary_navigation_item->post_title }}</span>
                    <span class="nav__icon inline-flex justify-center items-center bg-blue-xlight rounded-full ml2">
                        <svg class="icon--sm">
                            <use xlink:href="#arrow-down-icon"/>
                        </svg>
                    </span>
                </button>
                @include('partials.header.navigation-dropdown')
            </li>
            @else
                <li class="nav__item">
                    <a href="{{$primary_navigation_item->url}}" class="nav__link hover rift-font text-light inline-flex items-center nowrap text-base bold">
                        <span>{{ $primary_navigation_item->post_title ? $primary_navigation_item->post_title : $primary_navigation_item->title }}</span>
                        <span class="nav__icon inline-flex justify-center items-center bg-blue-xlight rounded-full ml2">
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