<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class BeebBeebSections extends Model
{
    use HasFactory;
    use HasFactory , HasTranslations ;
    protected $guarded=[];
    public $translatable = ['name','description','address'];
}
