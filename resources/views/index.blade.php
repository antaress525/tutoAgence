@extends('base')

@section('title', 'nos bien')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <form method="get" class="container d-flex gap-2">
            <input type="number" placeholder="buget max" name="price" class="form-control" value="{{ $input['price'] ?? '' }}">
            <input type="number" placeholder="surface min" name="surface" class="form-control" value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de piece min" name="piece" class="form-control" value="{{ $input['piece'] ?? '' }}">
            <input type="text" placeholder="Mot cle" name="title" class="form-control" value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary">Recherche</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mt-4">
                    @include('components.card', ['property'=>$property])
                </div>
            @empty
                <div class="text-center">
                    <h1>Aucun bien trouvees</h1>
                </div>
            @endforelse
        </div>
        <div>
            {{ $properties->links() }}
        </div>
    </div>
@endsection
