<?php

namespace App\Observers;

use App\Models\Products;
use App\Models\OfferProducts;
use App\Models\BeebBeebSections;
use Illuminate\Support\Facades\Cache;

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
        if (Cache::has('productSection_' . $products->beeb_beeb_sections_id)) {
            Cache::forget('productSection_' . $products->beeb_beeb_sections_id);
        } else if (Cache::has('productCategory_' . $products->category_products_id)) {
            Cache::forget('productCategory_' . $products->category_products_id);
        }

        $BeebSectino_id = $products->beeb_beeb_sections_id;

        $getSection = BeebBeebSections::find($BeebSectino_id);

        if (!($getSection->offer->status)) {
            return;
        } else {
            $Offer = $getSection->offer;
            $products->offer()->create([
                'code' => 'code' . time(),
                'discount' => $Offer->offer,
                'expire_date' => $Offer->expire_date,
                'status' => true,
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
