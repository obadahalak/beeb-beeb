<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Products extends Model
{
    use HasFactory , HasTranslations ;
    protected $guarded=[];
    public $translatable = ['name','description','addons','intgredients'];
}
