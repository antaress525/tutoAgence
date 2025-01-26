@extends('admin.base')

@section('title', 'propriete')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>les biens</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Ville</th>
                <th colspan="2" class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }}</td>
                    <td>{{ $property->price }}</td>
                    <td>{{ $property->city }}</td>
                    <td class="d-flex gap-2 justify-content-end">
                    <a href="{{ route('admin.property.edit',['property'=>$property->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.property.destroy',['property'=>$property->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $properties->links() }}
    </div>
@endsection
