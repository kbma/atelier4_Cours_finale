@extends('home')
@section('contenu')

    <div>
        <div class="col">
            @if (count($errors))
                <div class="alert alert-danger"role="alert">
                    <ul>
                        @foreach($errors->all() as $message)
                            <li>{{$message}}</li>

                         @endforeach
                    </ul>

                </div>

            @endif

        </div>
    </div>

    <form method="post" action="{{route('category.store')}}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input value="{{old('name')}}" minlength="2" maxlength="10" name="name" type="text" class="form-control mb-2" id="inlineFormInput" >
            </div>


            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Add</button>
            </div>
        </div>
    </form>

@endsection
