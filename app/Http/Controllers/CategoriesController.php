<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PerPage=5;
        $all = Category::orderBy('created_at','desc')->paginate($PerPage);
        return view('category.index',['all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories|max:20|min:2'
        ]);

        $c = new Category();
        $c->name=$request->name;
        $c->save();
        return redirect('category')->with('message','Catégorie ajoutée avec succès');
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
        return view('category.edit')->with('id',$id);
        //return view('category.edit',['id'=>$id]);
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
        //return redirect('category')->with('message','Catégorie modifiée avec succès');
        $c= Category::find($id);
        $c->name=$request->name;
        $c->updated_at=now();
        $c->save();
        return redirect()->route('category.index')->with('message','Catégorie modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('message','Catégorie supprimée avec succès');
    }

    public function find(){

            return view('category.find');

    }

    public function search(Request $request)
    {

            $cat= Category::where('name','like','%'.$request->name.'%')->paginate(5);

            return view('category.search',['all'=>$cat]);

    }


}
