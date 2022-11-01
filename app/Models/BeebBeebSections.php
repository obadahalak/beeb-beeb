<?php

namespace App\Models;

use App\Models\like;
use App\Models\Owners;
use App\Models\Photos;
use App\Models\Reviews;
use App\Models\Section;
use App\Models\Products;
use App\Contracts\Likeable;
use App\Models\Concerns\Likes;
use Illuminate\Support\Facades\DB;
use App\Models\Scopes\isActiveScope;
use App\Models\Scopes\ActiveOfferScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeebBeebSections extends Model implements Likeable
{
    //  use HasFactory;

    use Likes;

    use HasFactory, HasTranslations;

    protected $guarded = [];
    public $translatable = ['name', 'description', 'address'];



    ////// relationship  functions /////
    public function owner()
    {
        return $this->belongsTo(Owners::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    ////one image
    public function image()
    {
        return $this->morphOne(Photos::class, 'photo');
    }
    /////Gallery images
    public function images()
    {
        return $this->morphMany(Photos::class, 'photo');
    }

    public function products()
    {
        return $this->hasMany(Products::class)->with('offer');
    }

    public function islike()
    {
        return    $this->morphOne(like::class, 'like')->select('is_like');
    }

    public function reviews()
    {
        return  $this->hasMany(Reviews::class, 'beeb_beeb_sections_id');
    }




    ////////////////////////




    ///moutator and accessor////
    public function time(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }

    public function offer(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }

    //////////////


    ////globle function///////

    public static function booted()
    {
        static::addGlobalScope(new isActiveScope);
    }

    ////////





    ////////get Model /////

    public static   function model(): Model
    {
        return new (get_class());
    }
    public static function getPath()
    {
        return get_class(self::model());
    }

    //////////////////////
}
