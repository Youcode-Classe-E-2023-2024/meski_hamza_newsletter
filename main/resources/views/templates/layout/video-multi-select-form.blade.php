<button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2" onclick="openModal('modelConfirm')">
    send newsletter
</button>
<div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
    <div class=" relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

        <div class="flex justify-end p-2">
            <button onclick="closeModal('modelConfirm')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 pt-0 text-center text-black">
            <form action="{{ route('videos.send', $template->id) }}" method="POST" class="container mx-auto p-6">
                @csrf
                <h3 class="text-2xl font-bold mb-4">Select Users that will receive newsletters</h3>

                <input type="text" id="searchInput" class="w-full border border-gray-300 rounded-md px-4 py-2 mb-4" placeholder="Search options">
                <div id="optionsContainer" class="flex flex-col h-[200px] overflow-auto">
                    @for($i = 0; $i < count($users); $i++)
                        <div class="flex py-2">
                            <label for="option1" class="inline-flex justify-start items-center">
                                <input type="checkbox" name="check[]" value="{{ $users[$i]->email }}" class="checkBox mr-2 h-[20px] w-[50px] form-checkbox">
                                <span class="checkBoxSpan cursor-pointer">
                                    {{ $users[$i]->email }}
                                </span>
                            </label>
                        </div>
                    @endfor
                </div>
                <button type="submit" class="bg-green-500 px-4 py-2 rounded-md w-full mt-6 text-white">send</button>
            </form>
        </div>

    </div>
</div>
