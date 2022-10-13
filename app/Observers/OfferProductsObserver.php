<?php

namespace App\Observers;

use App\Models\OfferProducts;

class OfferProductsObserver
{
    /**
     * Handle the OfferProducts "created" event.
     *
     * @param  \App\Models\OfferProducts  $offerProducts
     * @return void
     */
    public function created(OfferProducts $offerProducts)
    {
        //
    }

    /**
     * Handle the OfferProducts "updated" event.
     *
     * @param  \App\Models\OfferProducts  $offerProducts
     * @return void
     */
    public function updated(OfferProducts $offerProducts)
    {
        //
    }

    /**
     * Handle the OfferProducts "deleted" event.
     *
     * @param  \App\Models\OfferProducts  $offerProducts
     * @return void
     */
    public function deleted(OfferProducts $offerProducts)
    {
        //
    }

    /**
     * Handle the OfferProducts "restored" event.
     *
     * @param  \App\Models\OfferProducts  $offerProducts
     * @return void
     */
    public function restored(OfferProducts $offerProducts)
    {
        //
    }

    /**
     * Handle the OfferProducts "force deleted" event.
     *
     * @param  \App\Models\OfferProducts  $offerProducts
     * @return void
     */
    public function forceDeleted(OfferProducts $offerProducts)
    {
        //
    }
}
