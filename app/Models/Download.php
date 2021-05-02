<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Download extends Model
{
    use HasFactory;

    protected $fillable = [
        "count",
        "user_id",
        "photo_id"
    ];

    public function photo(){
        return $this->belongsTo(Photo::class);
    }
}
