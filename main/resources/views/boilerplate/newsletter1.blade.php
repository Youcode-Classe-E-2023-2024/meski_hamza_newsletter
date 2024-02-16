<style>
    #newsletter1-section:hover {
        box-shadow: 10px 10px 2px 0px rgba(4,216,46,0.75);
        -webkit-box-shadow: 10px 10px 2px 0px rgba(4,216,46,0.75);
        -moz-box-shadow: 10px 10px 2px 0px rgba(4,216,46,0.75);
        margin-bottom: 10px;
        transition: all 1s;
    }
</style>
@if(isset($mytemplates) ?? null)
@else
    @if(auth()->user()->hasPermissionTo('send template'))
        @if(isset($fromEmail) ?? null)
        @else
            <div class="mx-40">
                @include('templates.layout.multi-select-form')
            </div>
        @endif
    @endif
@endif



<!-- Blog post with featured image -->
<div id="newsletter1-section" class="max-w-7xl mx-40 px-4 sm:px-6 lg:px-8 backdrop-blur-md border-2 border-solid border-green-500 py-4" style="background-color: rgba(0, 0, 0, 0.603);">
    <div class="max-w-3xl mx-auto">
        <!-- Blog post header -->
        <div class="py-8">
            <h1 class="text-3xl font-bold mb-2 text-green-500">{{ $template->subject }}</h1>
            <p class="text-gray-500 text-sm">{{ $template->name }}</p>
        </div>

        <!-- Featured image -->
        @if($template->getFirstMedia('media'))
            <img class="h-full object-cover" src="{{ $template->getFirstMedia('media')->getUrl() }}" width="733" height="412" />
        @endif

        <!-- Blog post content -->
        <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl mx-auto">
            <p>{{ $template->content }}</p>
        </div>
    </div>
</div>
