<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owners extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function setPasswordAttribute($password)
    {
        if (trim($password) === '') {
            return;
        }
        $this->attributes['password'] = bcrypt($password);
    }
}
