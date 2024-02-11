@extends('layout.layout')

@section('content')
    @guest()
        @include('main.main-guest')
    @endguest
    @auth()
        @include('main.main-auth')
    @endauth
@endsection
