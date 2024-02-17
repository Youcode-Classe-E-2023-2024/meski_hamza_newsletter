<main id="templates-container" class="">
    <div class="flex items-center p-4 mb-12 fixed top-0 z-10 bg-black bg-opacity-40 border-r-2 border-b-2 border-solid border-gray-800 backdrop-blur-sm">
        <h1 class="mr-2">CATEGORIES:</h1>
        <a href="{{ route('boilerplate', 1) }}" class="mr-2 hover:text-green-200 px-2 py-1 rounded-md {{ $boilerplate == 1 ? 'bg-green-500':'' }}">newsletter1</a>
        <a href="{{ route('boilerplate', 2) }}" class="mr-2 hover:text-green-200 px-2 py-1 rounded-md {{ $boilerplate == 2 ? 'bg-green-500':'' }}">newsletter2</a>
        <a href="{{ route('boilerplate', 3) }}" class="hover:text-green-200 px-2 py-1 rounded-md {{ $boilerplate == 3 ? 'bg-green-500':'' }}">newsletter3</a>
        <a href="{{ route('boilerplate', 4) }}" class=" px-8 py-1 bg-red-500 hover:bg-red-600 ml-4 rounded-md">Videos</a>
    </div>

    <div class="mt-20">
        @foreach($templates as $template)
            @if($template->is_deleted == false)
                @if($boilerplate == 1)
                    @include('boilerplate.newsletter1')
                @elseif($boilerplate == 2)
                    @include('boilerplate.newsletter2')
                @elseif($boilerplate == 3)
                    @include('boilerplate.newsletter3')
                @elseif($boilerplate == 4)
                    @include('boilerplate.newsletterVideo')
                @endif
            @endif
            <div class="my-6"></div>
        @endforeach
    </div>
</main>
