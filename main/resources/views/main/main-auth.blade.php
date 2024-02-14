<main id="templates-container" class="m-20">
    <div class="flex items-center mb-12">
        <h1 class="mr-2">CATEGORIES:</h1>
        <a href="{{ route('boilerplate', 1) }}" class="mr-2 hover:text-green-200 px-2 py-1 {{ $boilerplate == 1 ? 'bg-green-500':'' }}">newsletter1</a>
        <a href="{{ route('boilerplate', 2) }}" class="mr-2 hover:text-green-200 px-2 py-1 {{ $boilerplate == 2 ? 'bg-green-500':'' }}">newsletter2</a>
        <a href="{{ route('boilerplate', 3) }}" class="hover:text-green-200 px-2 py-1 {{ $boilerplate == 3 ? 'bg-green-500':'' }}">newsletter3</a>
    </div>


    @foreach($templates as $template)
        @if($boilerplate == 1)
            @include('boilerplate.newsletter1')
        @elseif($boilerplate == 2)
            @include('boilerplate.newsletter2')
        @elseif($boilerplate == 3)
            @include('boilerplate.newsletter3')
        @endif
        <div class="my-6"></div>
    @endforeach

</main>
