<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\WishList;
use App\Models\userLocation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function locations()
    {
        return $this->hasMany(userLocation::class, 'user_id');
    }


    // public function is_wishList($productId)
    // {
    //     return $this->wishList->contains('model_id', $productId);
    // }
    // public function is_wishListBeeb($productId)
    // {
    //     return $this->wishListBeeb->contains('model_id', $productId);
    // }
    // public function wishList()
    // {
    //     return $this->hasMany(WishList::class, 'user_id')
    //         ->where('model', 'App\\Models\\Products')
    //         ->orderBy('id', 'DESC')
    //         ->with('product');
    // }
    // public function wishListBeeb()
    // {
    //     return $this->hasMany(WishList::class, 'user_id')
    //         ->where('model', 'App\Models\BeebBeebSections')
    //         ->orderBy('id', 'DESC')
    //         ->with('beebSecton');
    // }



    public function likeProducts()
    {
        return $this->morphedByMany('App\Models\Products', 'like');
    }
    public function likebeebSection()
    {
        return $this->morphedByMany('App\Models\BeebBeebSections', 'like');
    }
}
