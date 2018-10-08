@extends('layouts.app')
@section('content')
    @include('partials.experience.experience-header')
    @if(count($posts) > 4)
        @include('partials.experience.experience-large')
    @else
        @include('partials.experience.experience-small')
    @endif
@endsection
