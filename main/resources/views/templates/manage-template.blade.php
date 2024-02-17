@extends('layout.layout')

@section('content')
    <main class="h-screen w-full ">
        <!-- Second child -->
        <main class=" p-4 flex items-center justify-center">
            <main class="flex flex-col w-full items-start gap-6">
                <main class="w-full">
                    <main class="backdrop-blur-sm border-2 border-solid border-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-2 text-white">
                        <form id="myForm" action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-2">
                            @csrf
                            <main>
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-bold mb-2 text-green-500">Name:</label>
                                    <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Template Name">
                                    @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="subject" class="block text-sm font-bold mb-2 text-green-500">Subject:</label>
                                    <input type="text" id="subject" name="subject" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Template Subject">
                                    @error('subject')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="content" class="block text-sm font-bold mb-2 text-green-500">Content:</label>
                                    <textarea id="content" name="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Template Content"></textarea>
                                    @error('content')
                                    <div class="text-red-500">{{ $message }}</div>
                                    @enderror
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
                                    <button onclick="submitForm()" type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Template</button>
                                </div>
                            </main>
                            <div class="mb-4">
                                <input type="hidden" name="image" value="">
                                <label for="content" class="block text-sm font-bold mb-2 text-green-500">Drop an Image here:</label>
                                <div id="section2" class="w-full h-full bg-black bg-opacity-40 border-[1px] border-solid border-green-500 rounded-md flex items-center justify-center">

                                </div>
                                @error('image')
                                <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </main>
                </main>
            </main>
        </main>

        <div id="section1" class="overflow-x-auto max-w-full flex m-6">
            @foreach($images as $image)
                <div class="image-container flex-shrink-0 mr-4" draggable="true">
                    @if($image->getFirstMedia('media'))
                        <img class="w-[300px] h-auto" src="{{ $image->getFirstMedia('media')->getUrl() }}" alt="{{ $image->description }}" />
                    @endif
                </div>
            @endforeach
        </div>

        <script>
            const imageContainers = document.querySelectorAll('.image-container');
            const dropZone = document.getElementById('section2');
            const hiddenInput = document.querySelector('input[name="image"]');

            imageContainers.forEach(imageContainer => {
                imageContainer.addEventListener('dragstart', dragStart);
            });

            dropZone.addEventListener('dragover', dragOver);
            dropZone.addEventListener('drop', drop);

            let draggedImage = null;

            function dragStart(event) {
                draggedImage = event.target;
            }

            function dragOver(event) {
                event.preventDefault();
            }

            function drop(event) {
                event.preventDefault();
                const droppedImage = draggedImage.cloneNode(true);
                const existingImage = dropZone.querySelector('img');
                if (existingImage) {
                    dropZone.removeChild(existingImage);
                }
                dropZone.appendChild(droppedImage);

                // Update the value of the hidden input field with the src attribute of the dropped image
                hiddenInput.value = droppedImage.src;
            }
        </script>
    </main>
@endsection
