<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferProducts extends Model
{
    use HasFactory , HasTranslations ;
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(Products::class);
    }

}
