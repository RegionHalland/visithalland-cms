@if(isset($get_breadcrumbs))
	<div class="breadcrumbs inline-block mb2">
		<div class="breadcrumbs__icon {{ App::getTermClassName() }}"></div>
		@foreach ($get_breadcrumbs as $breadcrumb)
		    @if ($breadcrumb['url'])
                 <a class="breadcrumbs__link" href="{{ $breadcrumb['url'] }}">{!! $breadcrumb['name'] !!}</a>
                 <span class="breadcrumbs__divider">/</span>
            @else
                <span class="breadcrumbs__link breadcrumbs__link--current" itemprop="name">{!! $breadcrumb['name'] !!}</span>
            @endif
	    @endforeach
	</div>
@endif
