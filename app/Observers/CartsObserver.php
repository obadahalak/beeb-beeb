<?php

namespace App\Observers;

use App\Models\Attribute;
use App\Models\Carts;
use App\Models\OfferProducts;

class CartsObserver
{
    /**
     * Handle the Carts "created" event.
     *
     * @param  \App\Models\Carts  $Carts
     * @return void
     */
    public function created(Carts $Carts)
    {
        $quantity = $Carts->quantity;
        $productPrice = $Carts->product->price;

        $ammount_befor_discount = $productPrice;
        $ammount_after_discount = $Carts->product->dicount_price;



        if ($Carts->addons) {

            $addonsPrice = Attribute::whereIn('id', $Carts->addons->add_id)->sum('price');

            $ammount_befor_discount += $addonsPrice;
            $ammount_after_discount += $addonsPrice;
            $Carts->ammount_befor_discount = $ammount_befor_discount * $quantity;
            $Carts->ammount_after_discount = $ammount_after_discount * $quantity;
            $Carts->save();
        } else {
            //else  not addons
            $ammount_befor_discountNotAddonse = $productPrice;
            $Carts->ammount_befor_discount = $ammount_befor_discountNotAddonse * $quantity;
            $Carts->ammount_after_discount = $ammount_after_discount * $quantity;
            $Carts->save();
        }
        if (!is_null($Carts->product->offer)) {
            // is offer
            // dd($ammount_after_discount);
            $ammount_after_Offer = $Carts->product->offer->discount *  $Carts->ammount_after_discount / 100  ;
            $Carts->ammount_after_offer=$ammount_after_Offer;
            $Carts->save();
        } else {
            $Carts->ammount_after_offer= $Carts->ammount_after_discount;
            $Carts->save();
            ////else not offer...
        }
    }

    /**
     * Handle the Carts "updated" event.
     *
     * @param  \App\Models\Carts  $Carts
     * @return void
     */
    public function updated(Carts $Carts)
    {
        //
    }

    /**
     * Handle the Carts "deleted" event.
     *
     * @param  \App\Models\Carts  $Carts
     * @return void
     */
    public function deleted(Carts $Carts)
    {
        //
    }

    /**
     * Handle the Carts "restored" event.
     *
     * @param  \App\Models\Carts  $Carts
     * @return void
     */
    public function restored(Carts $Carts)
    {
        //
    }

    /**
     * Handle the Carts "force deleted" event.
     *
     * @param  \App\Models\Carts  $Carts
     * @return void
     */
    public function forceDeleted(Carts $Carts)
    {
        //
    }
}
