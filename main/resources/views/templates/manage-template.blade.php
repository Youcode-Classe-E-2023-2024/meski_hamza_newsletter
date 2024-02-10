@extends('layout.layout')

@section('content')
    <div class="h-screen w-full pt-14 grid grid-cols-2">
        <!-- First child -->
        <div class=" p-4 flex items-center justify-center ">
{{--            @if($editing ?? null)--}}
{{--                @include('templates.layout.update-template-form')--}}
{{--            @else--}}
{{--                @include('templates.layout.template-form')--}}
{{--            @endif--}}
            <div class="w-full">
                <div class="backdrop-blur-sm border-2 border-solid border-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-2 text-white">
                    <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-bold mb-2 text-green-500">Name:</label>
                            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Template Name">
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-bold mb-2 text-green-500">Subject:</label>
                            <input type="text" id="subject" name="subject" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Template Subject">
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-bold mb-2 text-green-500">Content:</label>
                            <textarea id="content" name="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Template Content"></textarea>
                        </div>
                        <div class="mb-4 text-white">
                            <label for="image" class="block text-sm font-bold mb-2 text-green-500">Image:</label>
                            <input type="file" id="image" name="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="boilerplate" class="block text-sm font-bold mb-2 text-green-500">Choose one of the right side templates:</label>
                            <select id="boilerplate" name="boilerplate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="newsletter1">Newsletter 1</option>
                                <option value="newsletter2">Newsletter 2</option>
                                <option value="newsletter3">Newsletter 3</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Template</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <!-- Second child -->
        <div class="h-full  overflow-auto flex flex-col gap-6">
            <div>
                <img src="http://127.0.0.1:8000/storage/images/template1.png" alt="">
                <span class="text-white bg-green-500 p-2 inline-block mt-1">Template1</span>
            </div>
            <div>
                <img src="http://127.0.0.1:8000/storage/images/template2.png" alt="">
                <div class="text-white bg-green-500 p-2 inline-block mt-1">Template2</div>
            </div>
            <div>
                <img src="http://127.0.0.1:8000/storage/images/template3.png" alt="">
                <div class="text-white bg-green-500 p-2 inline-block mt-1">Template3</div>
            </div>
        </div>
{{--        <div class="bg-yellow-500 h-full overflow-auto">--}}
{{--            @foreach(auth()->user()->templates as $template)--}}
{{--                @include('templates.layout.template-card-to-edit')--}}
{{--                <div>1</div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </div>
@endsection
