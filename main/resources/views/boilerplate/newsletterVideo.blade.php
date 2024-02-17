

@if(auth()->user()->hasPermissionTo('send template'))
    @if(isset($fromEmail) ?? null)
    @else
        <div class="mx-40">
            @include('templates.layout.video-multi-select-form')
        </div>
    @endif
@endif


<!-- Blog post with featured image -->
<div id="newsletter1-section" class="max-w-7xl mx-40 px-4 sm:px-6 lg:px-8 backdrop-blur-md border-2 border-solid border-red-500 py-4" style="background-color: rgba(0, 0, 0, 0.603);">
    <div class="max-w-3xl mx-auto">

        <!-- Featured image -->
        @if($template->getFirstMedia('videos'))
            <video class="w-full" controls>
                <source src="{{ $template->getFirstMedia('videos')->getUrl() }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif


        <!-- Blog post content -->
        <div class="mt-4 prose prose-sm sm:prose lg:prose-lg xl:prose-xl mx-auto">
            <p>{{ $template->description }}</p>
        </div>
    </div>
</div>
