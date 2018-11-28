{{--
  Template Name: About Us Page
--}}

@extends('layouts.app')

@section('content')
    <article role="main" id="main-content">
        @include('partials.navigation.page-header')
        <div class="container w-11/12 md:w-10/12 mt-8 pb-8">
            <div class="article-body w-full md:w-8/12 ">
                {{ the_content() }}
            </div>
			<div class="w-full mt-8">
                @header(
                    [
                        'title' => "Kontaktpersoner"
                    ]
                )
                @endheader
                <div class="-mx-3 flex flex-wrap mt-3">
                    @foreach($contacts as $contact)
                        @php 
                            $contact_person = $contact['contact_person'];
                        @endphp
                        @contact(
                            [
                                'img' => get_field('profile_image', 'user_'. $contact_person['ID'])["sizes"]["vh_medium_square"],
                                'name' => $contact_person['display_name'],
                                'role' => get_field('role', 'user_'. $contact_person['ID']),
                                'email' => $contact_person['user_email'],

                            ]
                        )
                        @endcontact
                    @endforeach
                </div>
            </div>
    	</div>
    </article>
@endsection
