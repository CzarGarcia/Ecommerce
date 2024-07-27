<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
    ];

    //relacion de muchos a muchos
    public function products(){
        return $this->belongsToMany(Product::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    //relacion uno a muchos
    public function features(){
        return $this->hasMany(Feature::class);
    }
}