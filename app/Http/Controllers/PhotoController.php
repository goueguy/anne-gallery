<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Categorie;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photoCategories = Photo::with("categorie")->get();
        //dd($photoCategories->categorie->id);
        $listCategories = Categorie::all();
        return view("photos.index",compact("photoCategories","listCategories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Categorie::all();
        return view("photos.create",compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title"=>"required",
            "file"=>"required|image|mimes:jpg,png,jpeg,gif",
            "categorie_id"=>"required"
        ]);
        if($request->hasFile("file")){
            //get file with extension
            $fileNameWithExtension = $request->file("file")->getClientOriginalName();
            //get filename
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            //get file extension
            $extension = $request->file("file")->getClientOriginalExtension();
            //file to store in database
            $fileNameStore = $fileName."_".time().".".$extension;
            //$path = $request->file("file")->store("public/files",$fileNameStore);
             $request->file("file")->move("pictures", $fileNameStore);
         }else{
             $fileNameStore = "default.png";
         }
         $data = [
             "titre"=>$request->title,
             "file"=>$fileNameStore,
             "categorie_id"=>$request->categorie_id
         ];
        Photo::create($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }

    public function find(Request $request){
        $this->validate($request,[
            "title"=>"required|string",
        ]);
        
        $listCategories = Categorie::all();
        $categorie_id = $request->categorie_id;
        $titlePhoto = strtolower($request->title);
        $photoCategories = Photo::with("categorie")
        ->select("id","file","titre","categorie_id")
        ->where("titre","LIKE", "%".$titlePhoto."%")
        ->orWhere("categorie_id",$categorie_id)
        ->get();
        //var_dump($photoCategories);
        return view("photos.result",compact("photoCategories","listCategories"));
    }
}