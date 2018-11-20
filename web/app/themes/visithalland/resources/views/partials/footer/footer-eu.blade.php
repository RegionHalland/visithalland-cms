<div class="bg-blue-light py-3">
    <div class="container w-11/12 md:w-10/12 lg:w-10/12 mx-auto">
        <div class="flex flex-wrap -mx-3">
        <div class="w-6/12  sm:w-3/12 md:w-2/12 px-3 pt-3 mt-1">
            <img class="max-w-8" src="{{ $european_union['logo']['url'] }}" />
        </div>
        <div class="w-full sm:w-10/12  md:w-8/12  px-3 py-3">
            <p class="italic text-white text-sm max-w-8">
                {{ $european_union['disclaimer'] }}
            </p>
            <a class="mt-3 inline-block" href="{{ $european_union['link'] }}">
                <div class="read-more">
                    <span class="read-more__text light">
                        @php _e('Läs mer om projektet', 'visithalland') @endphp
                    </span>
                    <div class="read-more__button bg-orange-gradient">
                        <svg class="icon read-more__icon">
                            <use xlink:href="#arrow-right-icon"/>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
        </div>
    </div>
</div>