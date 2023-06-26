@extends('layouts.app')

@section('content')
@if (session('status'))
        <div class="alert alert-success" role="alert">
                {{ session('status') }}
        </div>
    @endif

    @yield('content')
    {{ __('You are logged in!') }} 

@endsection
