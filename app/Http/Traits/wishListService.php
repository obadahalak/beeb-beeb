<?php

namespace App\Http\Traits;

use App\Models\Reviews;
use App\Http\enum\nameSections;

trait wishListService
{


    public function modelNotFount()
    {
        return response()->json(['message' => 'error'], 400);
    }

    public function getTypeName($model)
    {

        $type = match ($model) {
            'App\Models\Products' => 'product',
            'App\Models\BeebBeebSections' => 'beebSection',
        };
        return $type;
    }
    public function WishListUser($model, $model_id)
    {
        try {
            $model::getPath();
        } catch (\error $er) {
            return $this->modelNotFount();
        }
        $model = $model::getPath();

        $getRecored = $model::find($model_id);
        if (!$getRecored) {
            return $this->modelNotFount();
        } else {

            $userWishList = auth('sanctum')->user()->wishList->where('model', $model)->where('model_id', $model_id)->first();
            if ($userWishList) {
                return response()->json(['message' => 'already exists'], '403');
            } else {
                return
                    auth('sanctum')->user()->wishList()->create([
                        'model' => $model,
                        'model_id' => $model_id,
                        'type' => $this->getTypeName($model),
                    ]);
            }
        }
    }
    public function getwishListUser(){
        auth('sanctum')->user()->wishList;
    }
}
