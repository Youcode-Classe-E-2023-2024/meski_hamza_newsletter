<!-- component -->
<div class="flex justify-center bg--500">
    <div class="flex flex-col w-full">
        <div class="w-full lg:w-6/12 md:w-6/12 mx-3 md:mx-0 lg:mx-0">
            @if(isset($mytemplates) ?? null)
            @else
                @if(auth()->user()->hasPermissionTo('send template'))
                    @if(isset($fromEmail) ?? null)
                    @else
                        @include('templates.layout.multi-select-form')
                    @endif
                @endif
            @endif

        </div>
        <div class="rounded overflow-hidden border w-full lg:w-6/12 md:w-6/12 bg-white mx-3 md:mx-0 lg:mx-0">
            @if($template->getFirstMedia('media'))
                <div class="h-[400px] w-full" style="background-image: url('{{ $template->getFirstMedia('media')->getUrl() }}'); background-size: cover;"></div>
            @endif

            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-xl text-black font-bold mb-4">{{ $template->name }}</h1>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">{{ $template->subject }}</h2>
                <p class="text-gray-600">{{ $template->content }}</p>
            </div>
        </div>
    </div>
</div>
