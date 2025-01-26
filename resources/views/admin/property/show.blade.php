@extends('admin.base')

@section('title', $property->exists? $property->title: 'creer un bien')

@section('content')
    <form action="{{$property->exists?route('admin.property.update',$property):route('admin.property.store')  }}" method="post">
        @csrf
        @if ($property->exists)
           @method('patch')
        @endif
        <div class="row">
            <x-input name='title' class="col" label="Titre" :value="$property->title"></x-input>
            <x-input name='surface' class="col" type="number" :value="$property->surface"></x-input>
            <x-input name='price' class="col" type="number" label="Prix" :value="$property->price"></x-input>
        </div>
        <x-input name='description' type="textarea" class="col" label="Ville" :value="$property->description"></x-input>
        <div class="row">
            <x-input name='piece' class="col" type="number" label="Adresse" :value="$property->piece"></x-input>
            <x-input name='room' class="col" type="number" label="Chambre" :value="$property->room"></x-input>
            <x-input name='floor' class="col" type="number" label="Etage" :value="$property->floor"></x-input>
        </div>
        <div class="row">
            <x-input name='adress' class="col" label="Adresse" :value="$property->adress"></x-input>
            <x-input name='city' class="col" label="Ville" :value="$property->city"></x-input>
            <x-input name='postal_code' class="col" type="number" label="Code postal" :value="$property->postal_code"></x-input>
        </div>
        <x-checkbox name="sold" label="vendu" :value="$property->sold"></x-checkbox>
        <x-select name="option" :options="$options" :value="$property->options()->pluck('id')"></x-select>
        <button class="btn btn-primary mt-3">
            @if ($property->exists)
                Modifier
            @else
                Creer
            @endif
        </button>
    </form>
@endsection
