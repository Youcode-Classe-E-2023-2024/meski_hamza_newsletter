@extends('layout.layout')
@section('content')
    <div class=" flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8" style="background-image: url('http://127.0.0.1:8000/storage/images/landingpageimage.jpg')">
        <div class="w-full max-w-md space-y-8">
            <div class="backdrop-blur-sm border-2 border-solid border-white p-6" style="background-color: rgba(0, 0, 0, 0.203);">
                <img class="mx-auto h-12 w-auto" src="https://www.svgrepo.com/show/499664/user-happy.svg" alt="" />
                <h2 class="my-3 text-center text-3xl font-bold tracking-tight">
                    Login
                </h2>

                <form action="{{ route('login.authenticate') }}" class="space-y-6 " method="post">
                    @csrf
                    <div>
                        <label for="" class="block text-sm font-medium">Email</label>
                        <div class="mt-1">
                            <input name="email" type="email" class="text-black px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div class="text-red-500">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium">Password</label>
                        <div class="mt-1">
                            <input name="password" type="password" class="text-black px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div class="text-red-500">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md border border-transparent bg-sky-400 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">Login
                            Account
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
