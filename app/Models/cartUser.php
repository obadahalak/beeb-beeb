<?php

namespace App\Models;

use App\Models\User;
use App\Models\Carts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cartUser extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $table='cart_users';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function carts(){
        return $this->hasMany(Carts::class,'cart_user_id');
    }

}
