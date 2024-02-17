<style>
    #newsletter2-section:hover {
        /*box-shadow: 10px 10px 2px 0px rgba(4,216,46,0.75);*/
        /*-webkit-box-shadow: 10px 10px 2px 0px rgba(4,216,46,0.75);*/
        /*-moz-box-shadow: 10px 10px 2px 0px rgba(4,216,46,0.75);*/
        /*margin-bottom: 10px;*/
        /*transition: all 1s;*/
    }
</style>

@if(isset($mytemplates) ?? null)
@else
    @if(auth()->user()->hasPermissionTo('send template'))
        @if(isset($fromEmail) ?? null)
        @else
            <div class="">
                @include('templates.layout.multi-select-form')
            </div>
        @endif
    @endif
@endif

<div id="newsletter2-section" class="min-h-screen flex flex-col p-2 justify-center backdrop-blur-md border-2 border-solid border-green-500"  style="background-color: rgba(0, 0, 0, 0.603);">
    <!-- Themes: blue, purple and teal -->
    <div data-theme="teal" class="mx-auto max-w-6xl">
        <h2 class="sr-only">Featured case study</h2>
        <section class="font-sans text-black">
            <div class="[ lg:flex lg:items-center ] [ fancy-corners fancy-corners--large fancy-corners--top-left fancy-corners--bottom-right ]">
                <div class="flex-shrink-0 self-stretch sm:flex-basis-40 md:flex-basis-50 xl:flex-basis-60">
                    <div class="h-full">
                        <article class="h-full">
                            <div class="h-full">
{{--                                @if($template->getFirstMedia('media'))--}}
{{--                                    <img class="h-full object-cover" src="{{ $template->getFirstMedia('media')->getUrl() }}" width="733" height="412" />--}}
{{--                                @endif--}}
                                <img class="h-full object-cover" src="{{ $template->image }}" width="733" height="412" />
                            </div>
                        </article>
                    </div>
                </div>
                <div class="p-6 bg-grey">
                    <div class="leading-relaxed">
                        <h2 class="leading-tight text-4xl font-bold text-white">{{ $template->subject }}</h2>
                        <p class="mt-4 text-white ">{{ $template->content }}</p>
                        <h3 class="mt-4 text-white bg-green-500 inline-block px-4 py-2">{{ $template->name }}</h3>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
