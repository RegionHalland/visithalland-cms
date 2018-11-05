@extends('layouts.app')
@section('content')
    @include('partials.experience.experience-header')
    @if(count($featured_experiences) >= 5)
        @include('partials.experience.experience-large')
    @else
        @include('partials.experience.experience-small')
    @endif
@endsection
