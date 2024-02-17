
@extends('layout.layout')

@section('content')
    <main id="templates-container" class="m-20 ">
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
                        <img width="500" class="mt-4 h-full object-cover rounded" src="{{ $template->image }}" alt="Template Image" />
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
