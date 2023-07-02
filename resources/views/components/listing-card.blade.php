{{-- we require to pass props for listing variable  --}}
@props(['listing'])

{{-- some basic designing --}}
{{-- x-card is just basic div that i render from another file or we can put here div like 
 <div class="bg-gray-50 border border-gray-200 rounded p-6"> </div> --}}

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/no-image.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listing/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            {{-- fetching tags from database or callig component of tage whose fetch tags from db  --}}
            <x-listing-tag :tagsCsv="$listing->tags" />
                
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
