<?php

namespace App\Observers;

use App\Models\BeebBeebSections;
use App\Models\OfferProducts;
use App\Models\Products;

class ProductObserver
{
    /**
     * Handle the Products "created" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function created(Products $products)
    {

        $BeebSectino_id=$products->beeb_beeb_sections_id;

        $getSection=BeebBeebSections::find($BeebSectino_id);

        if(is_null($getSection->offer)){
            return ;
        }else{
            $Offer=$getSection->offer;
            $products->offer()->create([
                    'code'=>'code'.time(),
                    'discount'=>$Offer->offer,
                    'expire_date'=>$Offer->expire_date,
                    'status'=>true,
            ]);
        }

    }

    /**
     * Handle the Products "updated" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function updated(Products $products)
    {
        //
    }

    /**
     * Handle the Products "deleted" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function deleted(Products $products)
    {
        //
    }

    /**
     * Handle the Products "restored" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function restored(Products $products)
    {
        //
    }

    /**
     * Handle the Products "force deleted" event.
     *
     * @param  \App\Models\Products  $products
     * @return void
     */
    public function forceDeleted(Products $products)
    {
        //
    }
}
