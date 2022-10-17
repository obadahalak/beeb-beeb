<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\BeebBeebSections;
use App\Models\CategoryProducts;
use Illuminate\Support\Facades\App;
use App\Http\Actions\SectionsAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\BeebBeebResource;
use App\Http\Resources\SectionResource;
use App\Http\Resources\CategoryResource;

class SectionsController extends Controller
{

    public function getSections(){
        return  SectionResource::collection(Section::get());
    }
    public function getCategoryFromSectionId($id){
        return  CategoryResource::collection(CategoryProducts::where('section_id',$id)->get());
    }

    public function beebBeebSection($id){
       return  BeebBeebResource::collection(BeebBeebSections::where('section_id',$id)->get());
    }

    public function getBeebBeebHasOffer(){
        return  BeebBeebResource::collection(BeebBeebSections::where('offer->status',true)->get());
    }

}
