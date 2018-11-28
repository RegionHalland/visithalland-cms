
@extends('layouts.app')

@section('content')
    <article role="main" id="main-content">
        @include('partials.navigation.page-header')
        <div class="container w-11/12  md:w-10/12 pt-8 pb-4">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-8/12 px-3">
                    <div class="article-body w-10/12">
                        {{ the_content() }}
                    </div>
                    @author()@endauthor
                </div>
                <div class="w-full md:w-4/12 px-3">

                </div>
            </div>
        </div>
    </article>
@endsection
