<nav class="nav w-full items-center md:justify-end md:flex-1 flex h-12 md:pr-4">
    <ul class="w-full flex justify-between md:justify-start lg:justify-end">
        @foreach(App::getPrimaryNavigationItems() as $primary_navigation_item)
            @if(is_array($primary_navigation_item->children))
            <li class="sm:mr-4 md:ml-2 md:mr-0 lg:ml-6">
                <button id="dropdown-button" class="has-dropdown hover font-rift outline-none text-white inline-flex items-center white-space-nowrap text-base text-white font-font-bold" aria-haspopup="true" aria-expanded="false">
                    <span class="font-bold">{!! $primary_navigation_item->post_title !!}</span>
                    <span class="h-6 w-6 inline-flex justify-center items-center bg-blue-light rounded-full ml-2">
                        <svg class="icon--sm">
                            <use xlink:href="#arrow-down-icon"/>
                        </svg>
                    </span>
                </button>
                @include('partials.header.navigation-dropdown')
            </li>
            @else
                <li class="sm:mr4 md:ml-2 md:mr-0 lg:ml-6">
                    <a href="{{$primary_navigation_item->url}}" class="outline-none hover font-rift text-white inline-flex items-center white-space-nowrap text-base text-white font-font-bold">
                        <span class="font-bold">{!! $primary_navigation_item->post_title ? $primary_navigation_item->post_title : $primary_navigation_item->title !!}</span>
                        <span class="h-6 w-6 inline-flex justify-center items-center bg-blue-light rounded-full ml-2">
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



