{{--
  Template Name: All activities Skördetider
--}}

@extends('layouts.landing')

@section('content')
	<header>
		<h1>{{ the_title() }}</h1>
	</header>	

	@php($fields = get_field('category'))
	@foreach($fields as $key => $field)
		@php($object = (object) $field)
		<div class="clearfix">
			<div class="category--gallery col col-4 overflow-hidden">
				{{-- Image Gallery TODO: Add js plugin --}}
				@foreach($object->gallery as $key => $gallery_image)
				<div style="width: 100%; margin-right: 10px;">
					<picture>
                        <source media="(min-width:40em)"
                            data-srcset="{{ $gallery_image["sizes"]["vh_large"] . " 1x," . $gallery_image["sizes"]["vh_large@2x"] . " 2x" }}" />
                        <source
                            data-srcset="{{ $gallery_image["sizes"]["vh_hero_tall"] . " 1x," . $gallery_image["sizes"]["vh_hero_tall@2x"] . " 2x" }}" />
                        <img class="lazyload"
                            data-src="{{ $gallery_image["sizes"]["vh_hero_tall"] }}"
                            alt="{{ $gallery_image["alt"] }}"
                        />
                    </picture>
                </div>
				@endforeach
			</div>

			{{-- Category name and description --}}
			<div class="col col-8 pl4">
				<h3>{{ $object->name }}</h3>
				<p>{{ $object->description }}</p>
					
				{{-- List of companies mentioned --}}
				<ul>			
					@foreach($object->links as $key => $link)
						<li><a href="{{$link["link"]}}" target="_blank">{{ $link["name"] }}</a></li>
					@endforeach
				</ul>

			</div>

		</div>
	@endforeach

@endsection