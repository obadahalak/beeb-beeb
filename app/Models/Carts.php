<?php

namespace App\Models;

use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Products::class);
    }
}
