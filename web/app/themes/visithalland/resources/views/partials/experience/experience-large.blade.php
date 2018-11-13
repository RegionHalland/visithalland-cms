@include('partials.experience.experience-featured')
@include('partials.experience.experience-spotlight')
@include('partials.experience.experience-featured-article')
<div class="mt-2 container w-11/12 md:w-10/12 lg:w-10/12 mx-auto">
    <div class="flex flex-wrap mt-8 -mx-3">
        <div class="w-full md:w-8/12 px-3 pb-5">
            @include('partials.experience.experience-grid')
        </div>
        <div class="w-full md:w-4/12 px-3 mb-6">
            @include('partials.experience.experience-sidebar')
        </div>  
    </div>
</div>