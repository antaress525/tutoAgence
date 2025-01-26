<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    @php
        $routeName = request()->route()->getName();
    @endphp
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'admin.property.')]) href="{{ route('admin.property.index') }}">Gerer les biens</a>
            <a @class(['nav-link', 'active' => str_starts_with($routeName, 'admin.option.')]) href="{{ route('admin.option.index') }}">Gerer les options</a>
        </div>
        <div class="ms-auto">
            @auth
                <div class="navbar-nav">
                    <form action="{{ route('logout') }}" method="post" class="nav-link">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Se deconnecter</button>
                    </form>
                </div>
            @endauth
        </div>
        </div>
    </div>
    </nav>
    <div class="container">
        @include('components.flash')
        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]',{plugins: {remove_button:{title:'Supprimer',}}});
    </script>
</body>
</html>
