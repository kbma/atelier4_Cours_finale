@extends('home')
@section('contenu')


    <form method="get" action="{{route('CatSearch')}}">
        @csrf
                <h4>Taper le nouveau nom de l'article</h4>
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input name="name" type="text" class="form-control mb-2" id="inlineFormInput" >
            </div>


            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Find</button>
            </div>
        </div>
    </form>

@endsection
