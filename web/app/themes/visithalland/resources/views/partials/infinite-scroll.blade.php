@php $nextPostLinks = App::getNextPostLink() @endphp

@if(!$nextPostLinks)

@else
<div class="next-post-link">
    <div id="nextPages" data-all='{{ json_encode($nextPostLinks) }}'></div>
</div>

<div class="page-load-status topographic-pattern bg-blue-light border-b border-px border-blue text-center">
    <div class="container w-11/12 md:w-10/12 lg:w-10/12 mx-auto">
        <div class="infinite-scroll-last">
            <span class="block font-rift font-bold text-white text-2xl py-4">😐 Vi hittar inte fler artiklar</span>
        </div>
        <div class="infinite-scroll-error">
            <span class="block font-rift font-bold text-white text-2xl py-4">😖 Något gick fel! Vi kan inte hämta fler artiklar.</span>
        </div>

    </div>
</div>
@endif