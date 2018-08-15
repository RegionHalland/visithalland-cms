<header>

    <!-- Support Header Start -->
    <section class="support-header">
        <ul>
            <li>Secondary Menu Item</li>
            <li>Secondary Menu Item</li>
            <li>Secondary Menu Item</li>
        </ul>
    </section>
    <!-- Support Header End -->


    <!-- Top Header Start -->
    <section class="top-header">
        <img class="logo" src="" alt="">
        <!-- Navigation Start -->
        <nav>
            <ul>
                @foreach(App::get_navbar_items() as $primary_navigation_item)
                    @if(is_array($primary_navigation_item->children) && count($primary_navigation_item->children) > 0)
                        <li>
                            <button class="button">{{ $primary_navigation_item->post_title }}</button>
                            <ul class="dropdown">
                                @foreach($primary_navigation_item->children as $child)
                                    <li>{{ $child->post_title }}</li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li>{{ $primary_navigation_item->post_title ? $primary_navigation_item->post_title : $primary_navigation_item->title }}</li>
                    @endif
                @endforeach
            </ul>
        </nav>
        <!-- Navigation End -->
        
        <input type="text" type="search">

    </section>
    <!-- Top Header End -->

</header>
