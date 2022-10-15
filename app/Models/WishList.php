<?php

namespace App\Models;

use App\Models\BeebBeebSections;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WishList extends Model
{
    use HasFactory  ;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Products::class,'model_id')->orderBy('id', 'DESC');
    }
    public function beebSecton(){
        return $this->belongsTo(BeebBeebSections::class,'model_id')->orderBy('id','DESC');
    }
}
