<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserRoll;
use App\Models\User;
use App\Models\PortfolioUser;
use App\Models\PortfolioUserConnection;
use App\Models\SchoolAndCollage;
use App\Models\EducationLevel;
use App\Models\EducationQualification;
use App\Models\Expertise;
use App\Models\WorkExperience;
use App\Models\Skills;
use App\Models\Languages;

class DataController extends Controller {

    //                                  FUNCTIONS FOR GET DEVELOPER TOOLS DETAILS


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUserRoll($is_active = null){
        $data = UserRoll::query();
        if($is_active){
            $data->where('is_active',$is_active);
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUser($is_active = null){
        $data = User::with('userRollDetails');
        if($is_active){
            $data->where('is_active',$is_active);
        }
        $data = $data->get();
        return $data;
    }



     //                                  FUNCTIONS FOR GET PORTFOLIO DETAILS


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET BASIC DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getBasicDetails() {
        $data = PortfolioUser::with( 'connections', 'userImage', 'coverImage' )->first();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET SCHOOLS DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSchoolDetails() {
        $data = SchoolAndCollage::all();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET EDUCATION LEVEL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getEducationLevel() {
        $data = EducationLevel::all();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET EDUCATION QUALIFICATION DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getEducationQualification() {
        $data = EducationQualification::with( 'educationDetails', 'schoolDetails' )->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET EXPERTISE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getExpertise() {
        $data = Expertise::all();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET SKILLS DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSkills() {
        $data = Skills::all();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET LANGUAGES DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getLanguages() {
        $data = Languages::all();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET WORK EXPERIENCE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getWorkExperience() {
        $data = WorkExperience::all();
        return $data;
    }
}
