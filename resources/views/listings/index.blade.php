{{-- @extends('layout') --}}
<!-- <h1>Listing</h1> -->
<!-- kind of props in react we pass heading from web.php file  -->



<!-- before reanme listing.blade.php  -->
<!--
    
    <?php foreach($listings as $listing): ?>
    <h1><?php echo $listing['title']; ?></h1>
    <p><?php echo $listing['description']; ?></p>
<?php endforeach ?> -->


<!-- for better formatting we use filename.blade.php  -->
{{-- <h1>{{ $heading }}</h1> --}}

<!-- ----------------  -->

<!-- way 1 -->
<!-- @if (count($listings) == 0)
<p>No Listing found</p>
@endif -->
{{-- @section('content') --}}


{{-- ---------------------------- --}}
{{-- main code started from here  --}}
{{-- x-layout is layout file that i moved from partials to components so don't need to use extends and section just calling the components  --}}
<x-layout>

    {{-- import hero div  --}}
    @include('partials._hero')
    {{-- import search bar  --}}
    @include('partials._search')

    {{-- Grid layout  --}}
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        <!-- way 2 -->
        @unless (count($listings) == 0)
            @foreach ($listings as $listing)
                {{-- pass listing as props for listing-card.blade.php file  --}}
                <x-listing-card :listing="$listing" />
            @endforeach
        @else
            <p>No Listing found</p>
        @endunless

    </div>
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>
    {{-- @endsection --}}
</x-layout>

{{-- extra things for testing purpos only  --}}
<!-- ---------------- -->
{{-- @php
        $test = 1;
    @endphp
    
    {{ 'testing:' . $test }} --}}
