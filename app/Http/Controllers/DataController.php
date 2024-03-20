<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\PortfolioUser;
use App\Models\PortfolioUserConnection;
use App\Models\SchoolAndCollage;
use App\Models\EducationLevel;
use App\Models\EducationQualification;
use App\Models\Expertise;
use App\Models\WorkExperience;
use App\Models\Skills;
use App\Models\Languages;

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

    public function getEducationQualification(){
        $data = EducationQualification::with('educationDetails','schoolDetails')->get();
        return $data;
    }

    public function getExpertise(){
        $data = Expertise::all();
        return $data;
    }

    public function getSkills(){
        $data = Skills::all();
        return $data;
    }

    public function getLanguages(){
        $data = Languages::all();
        return $data;
    }

    public function getWorkExperience(){
        $data = WorkExperience::all();
        return $data;
    }
}
