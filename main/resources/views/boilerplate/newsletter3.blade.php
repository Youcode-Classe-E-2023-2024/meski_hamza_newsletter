<!-- component -->
<div class="flex justify-center w-full">
    <div class="flex flex-col w-full items-center min-h-[600px]">
        <div class="w-[50%]">
            <div class="h-[400px] w-full" style="background-image: url('{{ $template->image }}'); background-size: cover;"></div>

            <div class="bg-white shadow-md  p-6">
                <h1 class="text-xl text-black font-bold mb-4">{{ $template->name }}</h1>
                <h2 class="text-lg font-semibold text-gray-700 mb-2">{{ $template->subject }}</h2>
                <p class="text-gray-600">{{ $template->content }}</p>
                <div class="py-5 text-sm font-regular text-gray-200 flex">
            <span class="mr-3 flex flex-row items-center">
                <svg class="text-green-500" fill="currentColor" height="13px" width="13px" version="1.1" id="Layer_1"
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
                <span class="ml-1 text-gray-900">{{ $template->created_at->diffForHumans() }}</span></span>
                    <div class="flex items-center justify-between">
                        <div class="flex flex-row items-center hover:text-green-500">
                            <svg class="text-green-500" fill="currentColor" height="16px" aria-hidden="true" role="img"
                                 focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill="currentColor"
                                      d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                </path>
                                <path d="M0 0h24v24H0z" fill="none"></path>
                            </svg>
                            <span class="ml-1 text-gray-900">{{ $template->user->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</div>
