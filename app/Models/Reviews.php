<?php

namespace App\Models;

use App\Models\User;
use App\Models\Products;
use App\Models\BeebBeebSections;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['review'];

    public function product(){
        return $this->belongsTo(Products::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function beeb_beeb_sections(){
        return $this->belongsTo(BeebBeebSections::class);
    }
}
