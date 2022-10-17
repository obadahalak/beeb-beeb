<?php

namespace App\Models;

use App\Models\Products;
use App\Models\Scopes\isActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferProducts extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(Products::class);
    }

    public static function booted(){
        static::addGlobalScope(new isActiveScope);
    }
}
