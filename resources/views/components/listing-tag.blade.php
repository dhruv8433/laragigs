{{-- Csv -> comma seperated view list --}}
@props(['tagsCsv'])

@php
    // it's function where do we want to split the string, we split by comma
    //it fetch all tags and put into $tags variable
    $tags = explode(',', $tagsCsv);
@endphp


<ul class="flex">
    @foreach ($tags as $tag)
        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
    
</ul>
