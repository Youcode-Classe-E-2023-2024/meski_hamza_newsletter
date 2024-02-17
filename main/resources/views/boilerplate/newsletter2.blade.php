
<div class="m-40">
    <div id="newsletter2-section" class="min-h-[600px] flex flex-col p-2 justify-center backdrop-blur-md border-2 border-solid border-gray-500"  style="background-color: rgba(0, 0, 0, 0.603);">
        <!-- Themes: blue, purple and teal -->
        <div data-theme="teal" class="mx-auto max-w-6xl p-10">
            <section class="font-sans text-black">
                <div class="grid grid-cols-2">
                    <div class="h-[500px] w-full" style="background-image: url('{{ $template->image }}'); background-size: cover; background-position: center"></div>
                    <div class="p-6 bg-grey">
                        <div class="leading-relaxed">
                            <h2 class="leading-tight text-4xl font-bold text-white">{{ $template->subject }}</h2>
                            <p class="mt-4 text-white ">{{ Illuminate\Support\Str::limit($template->content, 800) }}</p>
                            <div class="py-5 text-sm font-regular text-gray-200 flex">
            <span class="mr-3 flex flex-row items-center">
                <svg class="text-indigo-600" fill="currentColor" height="13px" width="13px" version="1.1" id="Layer_1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
			c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
			c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"></path>
                        </g>
                    </g>
                </svg>
                <span class="ml-1">{{ $template->created_at->diffForHumans() }}</span></span>
                                <div class="flex items-center justify-between">
                                    <div class="flex flex-row items-center hover:text-indigo-600">
                                        <svg class="text-indigo-600" fill="currentColor" height="16px" aria-hidden="true" role="img"
                                             focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor"
                                                  d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                            </path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                        </svg>
                                        <span class="ml-1">{{ $template->user->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

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

</div>
