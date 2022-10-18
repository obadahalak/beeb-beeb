<?php

namespace App\Models;

use App\Models\Photos;
use App\Models\Products;
use App\Models\OfferProducts;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Database\Factories\OfferProductsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerImages extends Model
{
    use HasFactory  ;
    protected $guarded=[];

    public function images(){
        return $this->morphMany(Photos::class, 'photo');
    }
    public function product(){
        return $this->belongsTo(Products::class);
    }
}
