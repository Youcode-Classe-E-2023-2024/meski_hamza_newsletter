@extends('layout.layout')

@section('content')
    <div class="flex flex-col md:grid md:grid-cols-3 gap-3 m-4">
        @foreach($images as $image)
            <div class="relative rounded overflow-hidden bg-white p-[2px]">
                @if($image->getFirstMedia('media'))
                    <img class="w-full" src="{{ $image->getFirstMedia('media')->getUrl() }}" width="733" height="412" alt="{{ $image->description }}" />
                @endif
                <p
                    class="cursor-pointer absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center text-2xl text-center text-white font-roboto font-medium group-hover:bg-opacity-60 transition">
                    {{ $image->description }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
