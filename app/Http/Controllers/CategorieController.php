<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories = Categorie::orderBy("id","desc")->paginate();
        return view("categories.index",compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,[
            "name"=>"required"
        ]);

        Categorie::create(["name"=>$request->name]);

        return back();
    }
    public function create(){
        return view("categories.create");
    }

    public function edit(Categorie $categorie){

        return view("categories.edit",compact('categorie'));

    }
    public function destroy(Categorie $categorie){

        $categorie->delete();

       return back();
    }
    public function update(Request $request,$categorie){

        Categorie::where('id', $categorie)
        ->update(['name' => $request->name]);
       return redirect("categories");
    }
}
