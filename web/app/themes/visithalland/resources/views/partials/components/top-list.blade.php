
@php 
    $current_list = get_field('top_list', $top_list->ID);
    $current_list_author = get_field('top_list_author', $top_list->ID);
    $current_list_author_meta = App::getAuthor($current_list_author['ID']);
@endphp
<div class="mb4">
    <header class="bg-blue-light py-3 line-h-3 topographic-pattern rounded overflow-hidden clearfix relative">
        <div class="col w-10/12 px-3">
            <div class="bg-blue-blue font-rift text-xs font-bold px-2 py-1 rounded-full inline-block text-white mb-2">{{ $current_list_author_meta['name'] }} tipsar</div>
            <h3 class="text-white text-xl">{{ $top_list->post_title }}</h3>
        </div>
        <div class="col w-2/12 px-3">
            <img class="absolute pin-r pin-b max-w-4 max-h-4 lazyload" src="{{$current_list_author_meta['byline_image']}}" alt="">
        </div>
    </header>
    <ol class="px2 flex flex-wrap">
        @foreach($current_list as $index => $current_list_item)
            <li class="inline-flex w-full mt-3">
                <div class="flex justify-center items-center bg-blue p-2 mr-3 rounded h-5 w-5 text-white font-fira italic">
                    {{ $index + 1 }}
                </div>
                <div class="truncate">
                    <a title="{{ $current_list_item->post_title }}" href="{{ the_permalink($current_list_item->ID) }}">
                        <span class="font-rift text-xl font-bold"">{{ $current_list_item->post_title }}</span>
                    </a>
                    <a title="{{ $current_list_item->post_title }}" href="{{ the_permalink($current_list_item->ID) }}">
                        <div class="read-more mt-2">
                            <span class="read-more__text">
                                @php _e( 'Läs mer', 'visithalland' ) @endphp
                            </span>
                            <div class="read-more__button">
                                <svg class="icon read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
    </ol>
</div>
