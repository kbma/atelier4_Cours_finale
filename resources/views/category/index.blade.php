@extends('home')
@section('contenu')

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
       @foreach( $all as $c)
        <tr>
            <th scope="row">{{$c->id}}</th>
            <td>{{$c->name}}</td>
            <td>{{$c->created_at}}</td>
            <td>{{$c->updated_at}}</td>
            <td><a class="btn btn-primary" href="{{route('category.edit',$c->id)}}">Edit</a>
                <a data-toggle="modal" data-target="#box{{$c->id}}" class="btn btn-danger" href="#">Delete</a></td>

            <!-- Modal -->
            <form  action="{{route('category.destroy',$c->id)}}" method="post" >
                @method('delete')
                @csrf
            <div class="modal" id="box{{$c->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Voulez vous vraiment supprimer la categorie  <g>{{$c->name}} </g>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button  type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>




        </tr>
       @endforeach
        </tbody>
    </table>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-20 text--center">
            {{ $all->links('pagination::bootstrap-4') }}
        </div>
        <!-- .col-md-12 end -->
    </div>

@endsection
