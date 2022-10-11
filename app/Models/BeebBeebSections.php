<?php

namespace App\Models;

use App\Models\Owners;
use App\Models\Photos;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
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
        return $this->morphOne(Photos::class, 'photos');
    }
    /////Gallery images
    public function images(){
        return $this->morphMany(Photos::class, 'photos');
    }
}
