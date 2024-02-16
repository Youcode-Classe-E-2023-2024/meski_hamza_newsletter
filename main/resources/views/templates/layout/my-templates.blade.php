
@extends('layout.layout')

@section('content')
    <main id="templates-container" class="m-20 ">
        <a href="#" class="border-b-2 border-red-500 hover:border-red-700 text-red-500 hover:text-red-700">Deleted Posts</a>
    @foreach(auth()->user()->templates as $template)
            <div class="mb-4 bg-black p-8 rounded-lg shadow-md mt-6">
                <div class="flex justify-end">
                    <div class="flex items-center space-x-4">
                        <!-- Edit Button -->
                        <div class="">
                            <!-- Trigger Button -->
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded openContactForm">
                                Edit template
                            </button>

                            <!-- Modal -->
                            <div class="fixed z-10 inset-0 overflow-y-auto hidden contactFormModal">
                                <div class="flex items-center justify-center min-h-screen">
                                    <div class="bg-white w-1/2 p-6 rounded shadow-md">
                                        <div class="flex justify-end">
                                            <!-- Close Button -->
                                            <button class="text-gray-700 hover:text-red-500 closeContactForm">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <h2 class="text-2xl font-bold mb-4">Contact Us</h2>

                                        <form enctype="multipart/form-data" action="{{ route('templates.update', $template->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="mb-4">
                                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                                <input type="text" id="name" name="name"
                                                       class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 text-gray-500">
                                                <div class="text-red-500">
                                                    @error('name')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Subject</label>
                                                <input type="text" id="subject" name="subject"
                                                       class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 text-gray-500">
                                                <div class="text-red-500">
                                                    @error('subject')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                                                <textarea id="content" name="content"
                                                          class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500 text-gray-500"></textarea>
                                                <div class="text-red-500">
                                                    @error('content')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                                                <input type="file" id="image" name="image">
                                                <div class="text-red-500">
                                                    @error('image')
                                                    {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <button type="submit"
                                                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                                                update
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>

                            // JavaScript to toggle the modal
                            // JavaScript to toggle the modal
                            document.querySelectorAll('.openContactForm').forEach(button => {
                                button.addEventListener('click', () => {
                                    button.closest('.flex').querySelector('.contactFormModal').classList.remove('hidden');
                                });
                            });

                            document.querySelectorAll('.closeContactForm').forEach(button => {
                                button.addEventListener('click', () => {
                                    button.closest('.contactFormModal').classList.add('hidden');
                                });
                            });


                        </script>

                        <!-- Delete Button -->
                        <form action="{{ route('templates.destroy', $template->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                Delete
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
        @endforeach
    </main>

@endsection
