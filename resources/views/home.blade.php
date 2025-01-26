@extends('base')

@section('title', 'Mon agence')

@section('content')
<x-alert type="danger" class="fw-bold w-100">un message de merde</x-alert>
    <div class="container">
        <h2>Nos dernier biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                        @include('components.card', ['property'=>$property])
                </div>
            @endforeach
        </div>
    </div>
@endsection
