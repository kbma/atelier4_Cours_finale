@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="d-flex">
                            <div class="dropdown mr-1">
                                <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                    Categories
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                    <a class="dropdown-item" href="{{route('category.index')}}">Lister</a>
                                    <a class="dropdown-item" href="{{route('category.create')}}">Ajouter</a>
                                    <a class="dropdown-item" href="{{route('CatFind')}}">Rechercher</a>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success">Produits</button>
                                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                    <a class="dropdown-item" href="{{route('product.index')}}">Lister</a>
                                    <a class="dropdown-item" href="{{route('product.create')}}">Ajouter</a>
                                    <a class="dropdown-item" href="#">Rechercher</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                        <br>
                    @yield('contenu')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
