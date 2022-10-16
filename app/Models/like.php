<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class like extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table='likes';

    public  function like(){
        return $this->morphTo()->where('user_id',auth('sanctum')->user()->id);
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }
}
