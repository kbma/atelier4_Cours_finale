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

    <form  action="{{route('product.update',$id)}}" method="post" >
        @method('put')
        @csrf

        <input type="hidden" name="_method" value="PUT" />
        <h4>Taper le nouveau nom du produit</h4>
        <div class="form-row align-items-center">
            <div class="col-6">
                <label  for="inlineFormInput">Product Name</label>
                <input value="{{App\Models\Product::find($id)->name}}" name="name" type="text" class="form-control mb-2" id="inlineFormInput" >
            </div>

            <div class="col-6">
                <label  for="inlineFormInput">Categorie</label>

            <select name="category_id" class="form-control mb-2">
                @foreach(\App\Models\Category::all() as $cat)
                <option @if ($cat->id == App\Models\Product::find($id)->category->id) selected    @endif value="{{$cat->id}}" > {{$cat->name}}</option>
                @endforeach()
            </select>

            </div>

        </div>




        <div class="form-row align-items-center">
            <div class="col-6">
                <label  for="inlineFormInput">Description</label>
                <input value="{{App\Models\Product::find($id)->description}}" name="description" type="text" class="form-control mb-2" id="inlineFormInput" >
            </div>

            <div class="col-6">
                <label  for="inlineFormInput">Price</label>

                <input value="{{App\Models\Product::find($id)->price}}" name="price" type="text" class="form-control mb-2" id="inlineFormInput" >


            </div>

        </div>


        <div class="form-row align-items-center">
            <div class="col-6">
                <label  for="inlineFormInput">Stock</label>
                <input value="{{App\Models\Product::find($id)->stock}}" name="stock" type="text" class="form-control mb-2" id="inlineFormInput" >
            </div>
            <div class="col-6">
                <input value="Edit" type="submit" class="btn btn-danger mb-2"/>
            </div>


        </div>















    </form>

@endsection
