{{--
  Template Name: Activities
--}}

@extends('layouts.day-in-halland')

@section('content')

{{-- PHP/html content starts --}}
<h1>{{ get_the_title() }}</h1>
<p>{{ the_content() }}</p>

{{-- PHP/html content ends --}}


{{-- Vue below --}}
<div id="app">
    <router-view></router-view>


    <router-link to="/">Hem</router-link>
    <br>
    <br>
    <router-link to="/time">Få inspiration</router-link>
    <br>
    <br>
    <router-link to="/activities">Activities</router-link>
    <br>
    <br>
    <router-link to="/results">Results</router-link>
</div>
@endsection
