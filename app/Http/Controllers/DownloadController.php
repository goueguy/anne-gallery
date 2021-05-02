<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function download(Photo $photo){

        //get download info to store
        $data = [
            "user_id"=>Auth::id(),
            "photo_id"=>$photo->id,
            "count"=>1
        ];
        //$countDownload = Download::where("user_id",Auth::id())->first();
        $countDownload = Download::where("user_id",Auth::id())->selectRaw("sum(count) as total")->get();
        //dd($countDownload[0]['total']);
        if($countDownload[0]['total']==0){
            Download::create($data);
        }
        elseif($countDownload[0]['total']>=3){
            return redirect("photos")->with("msg","VOUS AVEZ DROIT À 3 TÉLÉCHARGEMENTS MAXIMUM");
        }
        else{
                $photoData = Download::where("photo_id",$photo->id)
                ->where("user_id",Auth::id())->first();

                //dd($photoData!=null);
                if($photoData!==null){
                    Download::where("photo_id",$photo->id)
                ->where("user_id",Auth::id())
                ->update(["count"=>DB::raw('count+1')]);
                }else{
                    Download::create($data);
                }
                
            
        }
        //download image file
        return response()->download("pictures/".$photo->file);
    }
}
