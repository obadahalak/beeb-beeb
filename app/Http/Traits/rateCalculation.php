<?php
namespace App\Http\Traits;

use App\Models\Reviews;
use App\Http\enum\nameSections;

trait rateCalculation {

    public function getRating($getSectionName,$section_id){
        $sumReviews=Reviews::where($getSectionName,$section_id)->sum('rate');
        $countReviews=Reviews::where($getSectionName,$section_id)->count();
        $rating=$sumReviews / $countReviews  ;
        return $rating;
    }
}
