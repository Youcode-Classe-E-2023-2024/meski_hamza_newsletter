@include('layout.header')
<main class="min-h-screen w-full flex items-center justify-center" style="background-image: url('http://127.0.0.1:8000/storage/images/landingpageimage.jpg');">
    @if($template->boilerplate == 'newsletter1')
        <div>
            @include('boilerplate.newsletter1')
            <div class="flex justify-center mt-4">
                <a href="#" class=" text-white bg-red-500 hover:bg-red-700 px-4 py-2 rounded-sm">Download as PDF</a>
            </div>
        </div>
    @elseif($template->boilerplate == 'newsletter2')
        <div>
            @include('boilerplate.newsletter2')
            <div class="flex justify-center mt-4">
                <a href="#" class=" text-white bg-red-500 hover:bg-red-700 px-4 py-2 rounded-sm">Download as PDF</a>
            </div>
        </div>
    @elseif($template->boilerplate == 'newsletter3')
        <div>
            @include('boilerplate.newsletter3')
            <div class="flex justify-center mt-4">
                <a href="#" class=" text-white bg-red-500 hover:bg-red-700 px-4 py-2 rounded-sm">Download as PDF</a>
            </div>
        </div>
    @else
        @include('boilerplate.newsletterVideo')
    @endif
</main>

@include('layout.footer')
