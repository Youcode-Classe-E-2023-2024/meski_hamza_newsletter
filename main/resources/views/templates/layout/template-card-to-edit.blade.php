<div class="w-[600px] h-[400px]  max-w-sm mx-auto relative shadow-md rounded-lg cursor-pointer overflow-hidden mt-6">
    <div class="aspect-w-3 aspect-h-2 h-full">
        <img src="{{ $product->getImageURL() }}" alt="Image" class="w-full h-full object-cover rounded-t-lg">
    </div>
    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 backdrop-blur text-white p-4 rounded-b-lg">
        <h1 class="text-2xl font-semibold">{{ $product->title }}</h1>
        <p class="mt-2">{{ Illuminate\Support\Str::limit($product->content, 100) }}</p>
        @if(auth()->id() == $product->user->id)
            <div class="flex justify-center gap-2 mt-8">
                <a href="{{ route('products.edit', $product->id) }}" type="submit" class="text-green-500 bg-black hover:bg-gray-900 px-6 py-2 mt-2 rounded-md block">edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-red-500 bg-black hover:bg-gray-900 px-6 py-2 mt-2 rounded-md block">delete</button>
                </form>
            </div>
        @else
            <div class="flex w-full ">
                <a href="{{ route('products.show', $product->id) }}" class="bg-black block w-full text-center py-3 px-7 mt-4 text-white mt-6 text-yellow-500">view</a>
            </div>
        @endif

    </div>
</div>
