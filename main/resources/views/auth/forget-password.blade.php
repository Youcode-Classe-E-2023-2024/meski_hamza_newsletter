@extends('layout.layout')
@section('content')
    <div class=" flex h-screen items-center justify-center px-4 sm:px-6 lg:px-8" style="background-image: url('http://127.0.0.1:8000/storage/images/landingpageimage.jpg')">
        <div class="w-full max-w-md space-y-8">
            <div class="backdrop-blur-sm border-2 border-solid border-white p-6" style="background-color: rgba(0, 0, 0, 0.203);">
                <img class="mx-auto h-12 w-auto" src="https://www.svgrepo.com/show/499664/user-happy.svg" alt="" />
                <h2 class="my-3 text-center text-3xl font-bold tracking-tight">
                    Reset password
                </h2>

                <form action="{{ route('forget.password.post') }}" class="space-y-6 " method="post">
                    @csrf
                    <div>
                        {{-- errors --}}
                        <div>
                            @if($errors->any())
                                <div>
                                    @foreach($errors->all() as $error)
                                        <div class="text-red-500">{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif
                            @if(session()->has('error'))
                                <div class="text-red-500">{{ session('error') }}</div>
                            @endif
                            @if(session()->has('success'))
                                <div class="text-red-500">{{ session('success') }}</div>
                            @endif
                        </div>

                        <div class="text-center mb-6">We will send a message to your email to reset your password.</div>
                        <div class="mt-1">
                            <input name="email" type="email" placeholder="Enter you email..." class="text-black px-2 py-3 mt-1 block w-full rounded-md border border-gray-300 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-sky-500 sm:text-sm" />
                            <div class="text-red-500">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="flex w-full justify-center rounded-md border border-transparent bg-green-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2">
                            Token
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
