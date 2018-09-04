@php 
    if(get_the_ID() !== NULL) {
        $top_lists = get_field('top_lists', get_the_ID());
    } 
    if (is_archive()) {
        if (isset($term)) {
            $top_lists = get_field('top_lists', $term);
        } else {
            $top_lists = get_field('top_lists', 'option');
        }
    }
@endphp

@if(isset($top_lists))
    @foreach($top_lists as $top_list)
        @php 
            $current_list = get_field('top_list', $top_list->ID);
            $current_list_author = get_field('top_list_author', $top_list->ID);
            $current_list_author_meta = App::getAuthor($current_list_author['ID']);
        @endphp
        <div class="mb4">
            <header class="bg-blue py3 line-height-3 topographic-pattern rounded overflow-hidden clearfix relative">
                <div class="col col-10 px3">
                    <div class="bg-blue-xlight rift-font text-xs bold px2 py1 rounded-pill inline-block text-light mb2">{{ $current_list_author_meta['name'] }} tipsar</div>
                    <h3 class="text-light text-xl">{{ $top_list->post_title }}</h3>
                </div>
                <div class="col col-2 px3">
                    <img class="absolute right-0 bottom-0 max-width-4 max-height-4 lazyload" src="{{$current_list_author_meta['byline_image']}}" alt="">
                </div>
            </header>
            <ol class="px2 flex flex-wrap">
                @foreach($current_list as $index => $current_list_item)
                    <li class="inline-flex w-fill mt3">
                        <div class="flex justify-center items-center bg-blue p2 mr3 rounded height-3 width-3 text-light fira-font italic">
                            {{ $index + 1 }}
                        </div>
                        <div class="">
                            <a class="rift-font text-xl bold" title="{{ $current_list_item->post_title }}" href="{{ the_permalink($current_list_item->ID) }}">{{ $current_list_item->post_title }}</a>
                            <div class="read-more mt2">
                                <span class="read-more__text">
                                    @php _e( 'Läs mer', 'visithalland' ) @endphp
                                </span>
                                <div class="read-more__button">
                                    <svg class="icon read-more__icon">
                                        <use xlink:href="#arrow-right-icon"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    @endforeach
@endif