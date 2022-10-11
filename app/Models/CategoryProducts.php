<?php

namespace App\Models;

use App\Models\Photos;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryProducts extends Model
{
    use HasFactory  , HasTranslations;

    protected $guarded=[];
    public $translatable = ['name'];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function image(){
        return $this->morphOne(Photos::class, 'photos');
    }
}
