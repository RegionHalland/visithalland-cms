<div class="bg-blue-light py-3">
    <div class="container w-11/12 md:w-11/12 lg:w-10/12 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-6/12  sm:w-3/12 md:w-2/12 px-3 pt-3">
                <img class="max-w-8" src="{{ $european_union['logo']['url'] }}" />
            </div>
            <div class="w-full sm:w-10/12 md:w-10/12 lg:w-8/12 px-3 py-3">
                <p class="italic text-white text-sm max-w-8">
                    {{ $european_union['disclaimer'] }}
                </p>
                @include(
                    'partials.components.read-more', [
                    'title' => "Läs mer om projektet", 
                    'url' => $european_union['link'], 
                    'classes' => "light mt-2 inline-block"]
                )
            </div>
        </div>
    </div>
</div>