@extends('layout.layout')
@section('content')
    <!-- component -->
    <div class="h-full grid grid-cols-2 p-20 gap-4">
        <form enctype="multipart/form-data" class="backdrop-blur-sm border-[1px] border-solid border-white px-20 py-12 mt-8 space-y-3" action="{{route('uploadVideo')}}" method="POST" style="background-color: rgba(0, 0, 0, 0.203);">
            @csrf
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-white tracking-wide">Video description</label>
                <input name="description" class="text-gray-500 p-2 border border-black rounded-lg focus:outline-none focus:border-indigo-500" type="text" placeholder="Title">
                @error('description')
                    <div class="text-red-500">
                        {{ $message }}}
                    </div>
                @enderror

            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Attach Video</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                        <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                <img class="has-mask h-36 object-center" src="https://img.icons8.com/dusk/64/000000/video.png" alt="video icon">
                            </div>
                            <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here <br /> or <a href="#" id="" class="text-blue-600 hover:underline">select a video</a> from your computer</p>
                        </div>
                        <input name="video" type="file" accept="video/*" class="hidden" onchange="displayFileName(this)">
                        @error('video')
                        <div class="text-red-500">
                            {{ $message }}}
                        </div>
                        @enderror
                    </label>
                </div>
            </div>
            <p class="text-sm text-gray-300">
                <span>File type: mp4, avi, mov, etc.</span>
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
                    <h1 class="text-4xl text-center mb-6">Share Your Story with Video 🎥</h1>
                    <p class="text-2xl">
                        Elevate your newsletter experience by uploading a video. Whether it's a personal anecdote, a professional tip, or simply a glimpse into your world, videos bring your content to life in ways words alone can't. Let your creativity shine and engage your audience like never before. Upload a video now and make your newsletter stand out! 🙂
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
                const attachVideoLabel = document.querySelector(".border-dashed");
                attachVideoLabel.appendChild(newFileDisplay);
            }
        }
    </script>

@endsection
