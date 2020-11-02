<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PerPage=5;
        $all = Product::orderBy('created_at','desc')->paginate($PerPage);
        return view('Product.index',['all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:products|max:20|min:2',
            'price'=>'required|integer|max:100|min:1'
        ]);

        $c = new Product();
        $c->name=$request->name;
        $c->category_id=$request->category_id;
        $c->description=$request->description;
        $c->price=$request->price;
        $c->stock=$request->stock;
        $c->save();
        return redirect('product')->with('message','Produit ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
return 'show';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('Product.edit')->with('id',$id);
        //return view('Product.edit',['id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:20|min:2',
            'price'=>'required|max:1000|min:1',
            'stock'=>'required|integer|max:100|min:1'
        ]);
        //return redirect('Product')->with('message','Catégorie modifiée avec succès');
        $c= Product::find($id);
        $c->name=$request->name;
        $c->category_id=$request->category_id;
        $c->updated_at=now();
        $c->save();
        return redirect()->route('product.index')->with('message','Produit modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('Product.index')->with('message','Catégorie supprimée avec succès');
    }

    public function find(){

            return view('Product.find');

    }

    public function search(Request $request)
    {

            $cat= Product::where('name','like','%'.$request->name.'%')->paginate(5);

            return view('Product.search',['all'=>$cat]);

    }


}
