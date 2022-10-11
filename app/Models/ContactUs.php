<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactUs extends Model
{
    use HasFactory , HasTranslations ;
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
