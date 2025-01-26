@extends('base')

@section('title', 'Se connecter')

@section('content')
    <div class="container">
        <h1>@yield('title')</h1>
        <x-alert>@if (session('success')) {{ session('success') }}  @endif</x-alert>
        <form action="{{ route('login') }}" method="post" class="vstack gap-3">
            @csrf
            <x-input name="email" class="col" type="email"></x-input>
            <x-input name="password" class="col" type="password" label="Mot de passe"></x-input>
            <div class="mt-2">
                <button class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
@endsection
