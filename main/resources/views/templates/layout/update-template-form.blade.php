<!--   product form  -->
<div class="bg-white p-10 w-[90%]">
    <h1 class="text-black font-bold text-3xl text-center mb-8">add a product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data" class="flex flex-col gap-10">
        @csrf
        @method('put')
        <!-- flex -->
        <div class="flex items-center mb-5">
            <!--         tip - here neede inline-block , but why? -->
            <label for="" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Title</label>
            <input value="{{ $product->title }}" type="text" name="title" placeholder="Product example"
                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
            <div class="text-red-500">
                @error('title')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="flex items-center mb-5">
            <!--         tip - here neede inline-block , but why? -->
            <label for="" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Content</label>
            <textarea name="content" placeholder="Content example"
                      class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">{{ $product->content }}</textarea>
            <div class="text-red-500">
                @error('content')
                {{ $message }}
                @enderror
            </div>
        </div>


        <div class="flex items-center mb-5">
            <!--         tip - here neede inline-block , but why? -->
            <label for="" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">File</label>
            <input type="file" name="image" placeholder="file"
                   class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
                      text-gray-600 placeholder-gray-400
                      outline-none">
            <div class="text-red-500">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>


        <div class="text-right">
            <button type="submit" class="py-3 px-8 bg-green-400 text-white font-bold">Update</button>
        </div>

    </form>
</div>
