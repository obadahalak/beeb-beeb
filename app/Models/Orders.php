<?php

namespace App\Models;

use App\Models\User;
use App\Models\Drivers;
use App\Models\Products;
use App\Models\BeebBeebSections;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory, HasTranslations;
    protected $guarded = [];
    public $translatable = ['order_status', 'size_addons'];

    ////////////ORDER STATUS////////////
    const ACCEPTED=1;
    const REJECT=2;
    const PREPARING=3;
    const UNDER_DELIVERY=4;
    const NEAR_ADDRESS=5;
    const DELIVEED=6;


    public function beeb_beeb_section()
    {
        return $this->belongsTo(BeebBeebSections::class);
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function driver(){
        return $this->belongsTo(Drivers::class);
    }

}
