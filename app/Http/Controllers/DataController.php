<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\PortfolioUser;
use App\Models\PortfolioUserConnection;
use App\Models\SchoolAndCollage;
use App\Models\EducationLevel;

class DataController extends Controller
{
    public function getBasicDetails(){
        $data = PortfolioUser::with('connections','userImage','coverImage')->first();
        return $data;
    }

    public function getSchoolDetails(){
        $data = SchoolAndCollage::all();
        return $data;
    }

    public function getEducationLevel(){
        $data = EducationLevel::all();
        return $data;
    }
}
