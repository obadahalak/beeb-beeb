<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\like;
use App\Models\WishList;
use App\Contracts\Likeable;
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

    public function hasLiked(Likeable $likeable){
        if(!$likeable->exists){
            return false;
        }else{
                return $likeable->likes()->whereHas('user',fn($q)=>$q->whereId($this->id))
                ->exists();
        }
    }

    public function like(Likeable  $likeable)
    {
        if ($this->hasLiked($likeable)) {
            return $this;
        }
        (new like())
            ->user()->associate($this)
            ->like()->associate($likeable)
            ->save();

        return $this;
    }


    public function likes()
    {
        return $this->hasMany(like::class);
    }
    public function likeProducts()
    {
        return $this->morphedByMany('App\Models\Products', 'like');
    }
    public function likebeebSection()
    {
        return $this->morphedByMany('App\Models\BeebBeebSections', 'like');
    }
}
