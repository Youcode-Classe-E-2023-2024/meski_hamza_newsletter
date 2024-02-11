@include('layout.header')
<main class="min-h-screen w-full flex items-center justify-center" style="background-image: url('http://127.0.0.1:8000/storage/images/landingpageimage.jpg');">
    @if($template->boilerplate == 'newsletter1')
        @include('boilerplate.newsletter1')
    @elseif($template->boilerplate == 'newsletter2')
        @include('boilerplate.newsletter2')
    @elseif($template->boilerplate == 'newsletter3')
        @include('boilerplate.newsletter3')
    @endif
</main>

@include('layout.footer')
