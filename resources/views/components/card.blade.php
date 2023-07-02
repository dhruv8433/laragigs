{{-- if user want to pass some more attributes than we have to create another varibale that contain another paramer and pass that paramer our class  --}}
{{-- somethig like this remove class from div and pass into variable, it use this class and if we pass another thing that merge into previous or this class  --}}
<div {{$attributes -> merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}>
    {{ $slot }}
</div>
