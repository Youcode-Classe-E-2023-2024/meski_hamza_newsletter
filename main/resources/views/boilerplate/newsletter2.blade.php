<div class="min-h-screen flex flex-col p-2 justify-center bg-white">
    <!-- Themes: blue, purple and teal -->
    <div data-theme="teal" class="mx-auto max-w-6xl">
        <h2 class="sr-only">Featured case study</h2>
        <section class="font-sans text-black">
            <div class="[ lg:flex lg:items-center ] [ fancy-corners fancy-corners--large fancy-corners--top-left fancy-corners--bottom-right ]">
                <div class="flex-shrink-0 self-stretch sm:flex-basis-40 md:flex-basis-50 xl:flex-basis-60">
                    <div class="h-full">
                        <article class="h-full">
                            <div class="h-full">
{{--                                <img class="h-full object-cover" src="{{ $template->getUrl() }}" width="733" height="412" alt='""' typeof="foaf:Image" />--}}
                                @if($template->getFirstMedia('media'))
                                    <img class="h-full object-cover" src="{{ $template->getFirstMedia('media')->getUrl() }}" width="733" height="412" />
                                @endif
                            </div>
                        </article>
                    </div>
                </div>
                <div class="p-6 bg-grey">
                    <div class="leading-relaxed">
                        <h2 class="leading-tight text-4xl font-bold">{{ $template->subject }}</h2>
                        <p class="mt-4">{{ $template->content }}</p>
                        <h3 class="mt-4 text-white bg-black inline-block px-4 py-2">{{ $template->name }}</h3>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
