<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = [

    	"user_id",
    	"photo_id",
    	"count"
    ];

    public function photo(){
    	return $this->belongsTo(Photo::class);
    }
}
