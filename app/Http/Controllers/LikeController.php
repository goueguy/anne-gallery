<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Photo;
use App\Models\Categorie;
use Auth;
use DB;
class LikeController extends Controller
{
    public function liker(Request $request,$photo){
            
            $likesCount = Like::where("photo_id",$photo)->count();
            //dd($likesCount);
            if($likesCount>0){
            	$data = [
	            	"user_id"=>Auth::id(),
	            	"photo_id"=>$photo,
	            	"count"=>DB::raw("count+1")
            	];
            	Like::where("photo_id",$photo)->update($data);
            }else{
            	Like::create([
            	"user_id"=>Auth::id(),
            	"photo_id"=>$photo,
            	"count"=>1
            	]
        		);
            }

      return back();
            
    }

    public function likes(){
    	$photos_id= Like::where("user_id",Auth::id())->get();
    	//dd($photos_id);
    	$dataPhoto = [];
    	$categories = [];
    	foreach ($photos_id as $key => $value) {
    		$photo = Photo::where("id",$value->photo_id)->first();
    		$categorie = Categorie::where("id",$photo->categorie_id)->first();
    		array_push($dataPhoto, $photo);
    	}
    	//dd($categories);
    	
    	return view("photos.likes",compact('dataPhoto','categorie'));
    }
}
