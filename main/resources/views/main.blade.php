@extends('layout.layout')

@section('content')

    <!-- Landing page -->
    <section class="h-screen relative">
        <main class="h-screen w-full bg-black" style="background-image: url('http://127.0.0.1:8000/storage/images/landingpageimage.jpg')">

        </main>
        <main class="h-screen w-full absolute top-0 left-0 flex items-center justify-center" >
            <div class="space-y-4 flex flex-col items-center text-white backdrop-blur-sm px-12 py-20 border-2 border-solid border-white" style="background-color: rgba(0, 0, 0, 0.203);">
                <div class="text-4xl font-bold text-green-400">UNLIMITED NEWS:</div>
                <div class="text-4xl font-bold text-green-400"> Science, Tech, Economy, ...</div>
                <div class="text-xl hidden  sm:inline-block">Get access anywhere. Cancel anytime.
                </div>
                <div class="text-lg px-8 hidden text-bold sm:inline-block">Ready to explore? Enter your email to create or restart your membership.
                </div>
                <div class="w-full flex">
                    <input class="w-full focus:outline-none text-gray-400 px-4 py-3 bg-white" placeholder="Email address" type="text">
                    <div class="bg-red flex-shrink-0 flex ">
                        <button class="px-4 flex bg-green-400 ml-2  items-center">
                            Get Started
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </section>


@endsection
