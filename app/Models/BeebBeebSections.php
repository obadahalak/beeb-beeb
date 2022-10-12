<?php

namespace App\Models;

use App\Models\Owners;
use App\Models\Photos;
use App\Models\Section;
use App\Models\Scopes\isActiveScope;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BeebBeebSections extends Model
{
    use HasFactory;
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['name', 'description', 'address'];

    public function owner(){
        return $this->belongsTo(Owners::class);
    }
    public function section(){
            return $this->belongsTo(Section::class);
    }
    ////one image
    public function image(){
        return $this->morphOne(Photos::class, 'photo');
    }
    /////Gallery images
    public function images(){
        return $this->morphMany(Photos::class, 'photo');
    }

    public function time(): Attribute
    {
        return new Attribute(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }

    public static function booted(){
        static::addGlobalScope(new isActiveScope);
    }
}
