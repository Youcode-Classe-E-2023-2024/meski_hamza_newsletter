
@extends('layout.layout')

@section('content')
    <main id="templates-container" class="m-20 ">
        <a href="{{ route('mytemplates') }}" class="border-b-2 border-green-500 hover:border-green-700 text-green-500 hover:text-green-700">My Templates</a>
        @foreach(auth()->user()->templates as $template)
            @if($template->is_deleted == true)
                <div class="mb-4 bg-black p-8 rounded-lg shadow-md mt-6">
                    <div class="flex justify-end">
                        <div class="flex items-center space-x-4">
                            <!-- Delete Button -->
                            <form action="{{ route('templates.restore', $template->id) }}" method="post">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                    Restore
                                </button>
                            </form>

                        </div>
                    </div>
                    <div class="grid grid-cols-2">
                        @php
                            $lastMedia = $template->getMedia('media')->last();
                        @endphp

                        @if($lastMedia)
                            <img width="500" class="mt-4 h-full object-cover rounded" src="{{ $lastMedia->getUrl() }}" alt="Template Image" />
                        @endif

                        <div class="flex ">
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-300">{{ $template->name }}</h2>
                                <h1 class="text-xl text-gray-200">{{ $template->subject }}</h1>
                                <p class="text-gray-300">{{ $template->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </main>
@endsection
