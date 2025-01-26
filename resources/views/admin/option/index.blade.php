@extends('admin.base')

@section('title', 'propriete')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>les options</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary">Ajouter une option</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th colspan="2" class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $option)
                <tr>
                    <td>{{ $option->name }}</td>
                    <td class="d-flex gap-2 justify-content-end">
                        <a href="{{ route('admin.option.edit',['option'=>$option->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.option.destroy',['option'=>$option->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
