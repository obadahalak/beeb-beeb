<?php

namespace App\Models;

use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carts extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden=['in_cart'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Products::class,'products_id');
    }

    public function addons(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }


}
