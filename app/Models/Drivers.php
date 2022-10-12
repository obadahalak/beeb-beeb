<?php

namespace App\Models;

use App\Models\Photos;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Drivers extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function image(){
        return $this->morphOne(Photos::class, 'photo');
    }
}
