<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'family_id',
    ];

    // Relacion de 1 a muchos inversa
    public  function family(){
        return $this->belongsTo(Family::class);
    }

    // Relacion de 1 a muchos
    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }


}
