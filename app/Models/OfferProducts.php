<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferProducts extends Model
{
    use HasFactory , HasTranslations ;
    protected $guarded=[];

}
