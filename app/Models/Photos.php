<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photos extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function photos(){
        return $this->morphTo();
    }
}
