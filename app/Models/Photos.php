<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photos extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table='photos';

    public function photo(){
        return $this->morphTo();
    }
}
