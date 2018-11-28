<address class="w-full sm:w-6/12 md:w-3/12 block mb-4 px-3">
    <div class="overflow-hidden aspect-container aspect-1 relative rounded">
        <img
            data-src="{{ $img }}"
            alt="'Skrivet av: ' + {{ $name }}"
            class="absolute pin-l pin-t w-full lazyload"
        />
    </div>
    <div class="">
        <h3 class="font-rift font-bold roman block mt-2">{{ $name }}</h3>
        <span class="font-fira block text-sm italic text-grey-dark mt-2">{{ $role }}</span>
        <a class="mt-2 text-sm block underline" href="mailto:{{ $email }}">
            {{ $email }}
        </a>
    </div>
</address>