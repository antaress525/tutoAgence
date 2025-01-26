@extends('base')

@section('title' ,$property->title)

@section('content')
    <div class="container">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} piece {{ $property->surface }}m2</h2>
        <div class="text-primary fw-bold fs-4">
            {{ number_format($property->price, thousands_separator:' ')  }} FCFA
        </div>
        <hr>
        <div class="mt-4">
            <h4>Interesse par le bien</h4>
            @include('components.flash')
            <form action="{{ route('property.contact',$property) }}" method="post">
                @csrf
                <div class="row">
                    @include('components.input', ['name'=>'firstname','class'=>'col', 'label'=>'Prenom', 'type' => 'text'])
                    @include('components.input', ['name'=>'lastname','class'=>'col', 'label'=>'Nom', 'type' => 'text'])
                </div>
                <div class="row">
                    @include('components.input', ['name'=>'phone_number','class'=>'col', 'label'=>'Numero de telephone', 'type' => 'text'])
                    @include('components.input', ['name'=>'email','class'=>'col','type'=>'email',])
                </div>
                @include('components.input', ['name'=>'message','class'=>'col','type'=>'textarea'])
                <button class="btn btn-primary mt-2">Nous contactez</button>
            </form>
        </div>
        <div class="mb-4">
            <p>{{ $property->description }}</p>
            <!--  -->
            <div class="row">
                <div class="col-8">
                    <h2>Caracteristique</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface habitable</td>
                            <td>{{ $property->surface }}</td>
                        </tr>
                        <tr>
                            <td>Piece</td>
                            <td>{{ $property->piece }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->room }}</td>
                        </tr>
                        <tr>
                            <td>Etage</td>
                            <td>{{ $property->floor?: 'Rez de chausse' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>specificites</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">
                                {{ $option->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
