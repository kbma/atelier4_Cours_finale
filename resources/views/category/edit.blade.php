@extends('home')
@section('contenu')


    <form  action="{{route('category.update',$id)}}" method="post" >
        @method('put')
        @csrf

        <input type="hidden" name="_method" value="PUT" />
        <h4>Taper le nouveau nom de l'article</h4>
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input value="{{App\Models\Category::find($id)->name}}" name="name" type="text" class="form-control mb-2" id="inlineFormInput" >
            </div>

            <div class="col-auto">
                <input value="Edit" type="submit" class="btn btn-danger mb-2"/>
            </div>
        </div>
    </form>

@endsection
