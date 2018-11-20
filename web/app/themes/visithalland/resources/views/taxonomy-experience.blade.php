@extends('layouts.app')
@section('content')
	{{-- Hero Start --}}
    @include('partials.experience.experience-hero')
    {{-- Hero End --}}
    {{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
    {{-- Check if there's at least 5 selected featured articles --}}
    @if(count($taxonomy_featured_posts) >= 5)
    	{{-- Experience Large Start --}}
        @include('partials.experience.experience-large')
        {{-- Experience Large End --}}
    @else
    	{{-- Experience Small Start --}}
        @include('partials.experience.experience-small')
        {{-- Experience Small End --}}
    @endif
@endsection
