<?php

namespace App\Models;

use App\Models\like;
use App\Models\Photos;
use App\Models\Section;
use App\Contracts\Likeable;
use App\Models\Attribute as ModelsAttribute;
use App\Models\OfferProducts;
use App\Models\Concerns\Likes;
use App\Models\BeebBeebSections;
use App\Models\CategoryProducts;
use App\Models\Scopes\isActiveScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model  implements Likeable
{
    use HasFactory, HasTranslations, Likes;

    protected $guarded = [];

    public $translatable = ['name', 'description', 'intgredients'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function beeb_beeb_section()
    {
        return $this->belongsTo(BeebBeebSections::class);
    }
    public function category_product()
    {
        return $this->belongsTo(CategoryProducts::class);
    }

    public function offer()
    {
        return $this->hasOne(OfferProducts::class)->where('status', 1);
    }
    public function image()
    {
        return $this->morphOne(Photos::class, 'photo');
    }


    public function islike()
    {
        return    $this->morphOne(like::class, 'like')->select('is_like');
    }


    public function attributes()
    {
        return $this->hasMany(ModelsAttribute::class, 'products_id');
    }


    public function reviews()
    {
        return  $this->hasMany(Reviews::class, 'products_id');
    }

    public function Rating()
    {
        return  $this->hasMany(Reviews::class, 'products_id');
    }

    public function scopeAvg($query, $rate)
    {

        return $query->withAvg(['Rating as rate' => function ($q) use ($rate) {

            $q->where('rate', '>=', $rate);
        }], 'rate')->whereHas('Rating', function ($q) use ($rate) {
            $q->where('rate', '>=', $rate);
        })->orderBy('rate', 'DESC');
    }


    public function intgredients(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }

    public function size(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }

    public function addons(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }






    public static function booted()
    {
        static::addGlobalScope(new isActiveScope);
    }







    public static   function model(): Model
    {
        return new (get_class());
    }
    public static function getPath()
    {
        return get_class(self::model());
    }
}
