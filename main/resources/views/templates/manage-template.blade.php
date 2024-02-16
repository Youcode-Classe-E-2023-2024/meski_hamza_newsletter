@extends('layout.layout')

@section('content')
    <div class="h-screen w-full pt-14 grid grid-cols-2">
        <!-- First child -->
        <div class=" p-4 flex items-center justify-center">
            <div class="flex flex-col w-full items-start gap-6">
                <a href="{{ route('mytemplates', 1) }}" class="p-2 text-2xl ">my templates</a>
                <div class="w-full">
                    <div class="backdrop-blur-sm border-2 border-solid border-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-2 text-white">
                        <form id="myForm" action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                            <div class="mb-4 text-white">
                                <label for="image" class="block text-sm font-bold mb-2 text-green-500">Image:</label>
                                <input type="file" id="image" name="image" accept="image/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('image')
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
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second child -->
        <div id="imagesProvider" class="h-full  overflow-auto flex flex-col gap-6">
            <div>
                <img src="http://127.0.0.1:8000/storage/images/template1.png" alt="" class="img">
                <span class="text-white bg-green-500 p-2 inline-block mt-1">Template1</span>
            </div>
            <div>
                <img src="http://127.0.0.1:8000/storage/images/template2.png" alt="" class="img">
                <div class="text-white bg-green-500 p-2 inline-block mt-1">Template2</div>
            </div>
            <div>
                <img src="http://127.0.0.1:8000/storage/images/template3.png" alt="" class="img">
                <div class="text-white bg-green-500 p-2 inline-block mt-1">Template3</div>
            </div>
        </div>
    </div>




{{--    <script>--}}
{{--        const imageContainer = document.getElementById('imageContainer');--}}
{{--        const imagesProvider = document.getElementById('imagesProvider');--}}
{{--        const form = document.getElementById('manage-template-form');--}}

{{--        console.log('Form:', form);--}}

{{--        // Add event listeners to the images in the imagesProvider section--}}
{{--        imagesProvider.querySelectorAll('img').forEach(img => {--}}
{{--            img.addEventListener('dragstart', handleDragStart);--}}
{{--        });--}}

{{--        // Add event listeners to the imageContainer section--}}
{{--        imageContainer.addEventListener('dragover', handleDragOver);--}}
{{--        imageContainer.addEventListener('drop', handleDrop);--}}

{{--        function handleDragStart(e) {--}}
{{--            console.log('Drag Start:', e.target.src);--}}
{{--            e.dataTransfer.setData('text/plain', e.target.src);--}}
{{--        }--}}

{{--        function handleDragOver(e) {--}}
{{--            e.preventDefault();--}}
{{--            console.log('Drag Over');--}}
{{--        }--}}

{{--        function handleDrop(e) {--}}
{{--            e.preventDefault();--}}
{{--            console.log('Drop');--}}

{{--            // Clear the imageContainer before adding the new image--}}
{{--            imageContainer.innerHTML = '';--}}

{{--            // Create a new image element and set its src attribute to the dropped image URL--}}
{{--            const img = document.createElement('img');--}}
{{--            img.src = e.dataTransfer.getData('text/plain');--}}
{{--            console.log('Dropped Image URL:', img.src);--}}

{{--            // Append the image to the imageContainer--}}
{{--            imageContainer.appendChild(img);--}}

{{--            // Convert the dropped image data to a Blob object--}}
{{--            fetch(img.src)--}}
{{--                .then(response => {--}}
{{--                    console.log('Fetch Response:', response);--}}
{{--                    return response.blob();--}}
{{--                })--}}
{{--                .then(blob => {--}}
{{--                    console.log('Image Blob:', blob);--}}

{{--                    // Create a new FormData object and append the image as a file--}}
{{--                    const formData = new FormData();--}}
{{--                    formData.append('image', blob, 'dropped_image.png');--}}
{{--                    console.log('FormData:', formData); // Add this line to log the FormData object--}}

{{--                    // Submit the form with the FormData object--}}
{{--                    fetch(form.action, {--}}
{{--                        method: 'POST',--}}
{{--                        body: formData--}}
{{--                    })--}}
{{--                        .then(response => {--}}
{{--                            console.log('Form Submission Response:', response);--}}
{{--                            if (response.ok) {--}}
{{--                                return response.json();--}}
{{--                            }--}}
{{--                            throw new Error('Network response was not ok.');--}}
{{--                        })--}}
{{--                        .then(data => {--}}
{{--                            console.log('Form submission successful:', data);--}}
{{--                            // Handle success if needed--}}
{{--                        })--}}
{{--                        .catch(error => {--}}
{{--                            console.error('Form submission error:', error);--}}
{{--                            // Handle error if needed--}}
{{--                        });--}}
{{--                })--}}
{{--                .catch(error => {--}}
{{--                    console.error('Error fetching image data:', error);--}}
{{--                    // Handle error if needed--}}
{{--                });--}}
{{--        }--}}
{{--    </script>--}}



@endsection
