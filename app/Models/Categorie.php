<?php

namespace App\Models;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        "name"
    ];

    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
