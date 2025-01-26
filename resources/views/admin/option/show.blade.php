@extends('admin.base')

@section('title', $option->exists? $option->title: 'creer un bien')

@section('content')
    <form action="{{$option->exists?route('admin.option.update',$option):route('admin.option.store')  }}" method="post">
        @csrf
        @if ($option->exists)
           @method('patch')
        @endif
        <x-input name="name" label="Nom" :value="$option->name"></x-input>

        <button class="btn btn-primary mt-2">
            @if ($option->exists)
                Modifier
            @else
                Creer
            @endif
        </button>
    </form>
@endsection
