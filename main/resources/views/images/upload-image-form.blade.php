@extends('layout.layout')

@section('content')
    <!-- component -->
    <div class="h-full grid grid-cols-2 p-20 gap-4">
        <form enctype="multipart/form-data" class="backdrop-blur-sm border-[1px] border-solid border-white px-20 py-12 mt-8 space-y-3" action="{{ route('uploadImage') }}" method="POST" style="background-color: rgba(0, 0, 0, 0.203);">
            @csrf
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-white tracking-wide">Image description</label>
                <input name="description" class="text-gray-500 p-2 border border-black rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="Description">
                @error('description')
                <div class="text-red-500">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Image</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                        <div class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                <img class="h-36 object-center" src="https://img.icons8.com/ios-filled/50/00FF00/image.png" alt="image icon">
                            </div>
                            <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here <br /> or <a href="#" id="" class="text-blue-600 hover:underline">select an image</a> from your computer</p>
                        </div>
                        <input name="image" type="file" accept="image/*" class="hidden" onchange="displayFileName(this)">
                        @error('image')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                        @enderror
                    </label>
                </div>
            </div>
            <p class="text-sm text-gray-300">
                <span>File types: jpg, jpeg, png, etc.</span>
            </p>
            <div>
                <button type="submit" class="my-5 w-full flex justify-center bg-green-500 text-gray-100 p-4  rounded-full tracking-wide
                            font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                    Upload
                </button>
            </div>
        </form>
        <div class="backdrop-blur-sm border-[1px] border-solid border-white px-20 py-12 mt-8 space-y-3" style="background-color: rgba(0, 0, 0, 0.203);">
            <div class="h-full flex items-center">
                <div>
                    <h1 class="text-4xl text-center mb-6">Share Your Story with Images 📸</h1>
                    <p class="text-2xl">
                        Elevate your content by uploading images. Whether it's a breathtaking landscape, a delicious meal, or a moment with loved ones, images capture emotions and experiences in ways words alone can't. Let your creativity shine and engage your audience like never before. Upload an image now and make your content stand out! 🙂
                    </p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function displayFileName(input) {
            const fileName = input.files[0].name;
            const fileDisplay = document.querySelector(".file-display");
            if (fileDisplay) {
                fileDisplay.textContent = fileName;
            } else {
                const newFileDisplay = document.createElement("p");
                newFileDisplay.className = "file-display";
                newFileDisplay.textContent = fileName;
                const attachImageLabel = document.querySelector(".border-dashed");
                attachImageLabel.appendChild(newFileDisplay);
            }
        }
    </script>
@endsection
