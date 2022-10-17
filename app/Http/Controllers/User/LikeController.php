<?php

namespace App\Http\Controllers\User;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BeebBeebSections;

class LikeController extends Controller
{
    public function  createLike(){
        $userId=auth('sanctum')->user()->id;
        $product=BeebBeebSections::find(3);
        dd($product->likes()->create([
            'user_id'=>$userId,
            'is_like'=>true,
        ]));

    }

    public function userLikes(){
        $userId=auth('sanctum')->user()->id;
       $product=Products::find(10);
       return $product->likes;

    }

}
