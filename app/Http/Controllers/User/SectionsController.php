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
    public function getCategory(){

        return  CategoryResource::collection(CategoryProducts::get());
    }

    public function beebBeebSection(){


       return  BeebBeebResource::collection(BeebBeebSections::get());
    }
}
