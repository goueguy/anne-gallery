<?php

namespace App\Models;
use App\Models\Download;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        "titre",
        "file",
        "categorie_id"
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function downloads(){
        return $this->hasMany(Download::class);
    }
}
