<main class="m-6">
    @foreach($templates as $template)
        @include('boilerplate.newsletter2')
        <div class="my-6"></div>
    @endforeach

{{--    @include('boilerplate.newsletter2')--}}
{{--    <div class="my-6"></div>--}}
{{--    @include('boilerplate.newsletter2')--}}
{{--    <div class="my-6"></div>--}}
{{--    @include('boilerplate.newsletter2')--}}
</main>

{{--<div class="my-6"></div>--}}
{{--@include('boilerplate.newsletter1')--}}
{{--<div class="my-6"></div>--}}
{{--@include('boilerplate.newsletter3')--}}

{{--@foreach($templates as $template)--}}
{{--    <img class="h-full object-cover" src="{{ $template->getUrl() }}" width="733" height="412" />--}}
{{--    <h1>{{ $template->name }}</h1>--}}
{{--@endforeach--}}
