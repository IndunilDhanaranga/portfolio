<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserRoll;
use App\Models\UserRollPermission;
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

use App\Models\ProjectType;
use App\Models\ProjectStatus;
use App\Models\Project;

use App\Models\ProjectClient;

use App\Models\TaskCategory;
use App\Models\Task;
use App\Models\TaskStatus;

use App\Models\BankAccount;

class DataController extends Controller {

    //                                  FUNCTIONS FOR GET DEVELOPER TOOLS DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUserRoll( $is_active = null ) {
        $data = UserRoll::query();
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL FOR EDIT USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUserRollForEdit( $id ) {
        $data = UserRoll::find( $id );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER ROLL PERMISSION FOR EDIT USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSelectedUserRollPermission( $id ) {
        $data = UserRollPermission::where( 'user_roll_id', $id )->get()->pluck( 'permission' );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function getUser( $is_active = null ) {
        $data = User::with( 'userRollDetails' );
        if ( $is_active ) {
            $data->where( 'is_active', $is_active );
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

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getDetailsForPortfolio() {
        $project = Project::with('projectTypeDetails','clientDetails','projectStatusDetails','imageDetails','portfolioProjectDetails')->where('is_publish',1);
        $task = Task::with('projectDetails','taskCategoryDetails','taskStatusDetails','taskTimeDetails','taskTeamDetails','taskAttachmentDetails')->get();
        $client = ProjectClient::query();
        $project_type = ProjectType::query();


        $totalHoursWorked = $task->sum(function ($tasks) {
            return $tasks->taskTimeDetails->full_wasted_time;
        });

        $data['hours_worked'] = $totalHoursWorked;
        $data['project_count'] = $project->count('id');
        $data['client_count'] = $client->count('id');
        $data['project_type'] = $project_type->get();
        $data['project'] = $project->get();
        return $data;
    }


    //                                  FUNCTIONS FOR GET PROJECT DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET PROJECT TYPES
    ----------------------------------------------------------------------------------------------------------
    */

    public function getProjectType() {
        $data = ProjectType::with( 'technologyDetails' )->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET PROJECT TYPES
    ----------------------------------------------------------------------------------------------------------
    */

    public function getProjectStatus() {
        $data = ProjectStatus::all();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET PROJECT
    ----------------------------------------------------------------------------------------------------------
    */

    public function getProject( $status = null ) {
        $data = Project::with( 'projectTypeDetails.technologyDetails', 'clientDetails', 'imageDetails', 'projectStatusDetails' );
        if ( $status ) {
            $data = $data->where( 'status', $status );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET PUBLISHED PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getProjectsDetailsForPublished() {
        $data = Project::select('id','title','is_publish')->get();
        return $data;
    }

    //                                  FUNCTIONS FOR GET CLIENT DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET ALL CLIENTS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getAllClients( $is_active = null ) {
        $data = ProjectClient::query();
        if ( $is_active ) {
            $data = $data->where( 'is_active', $is_active );
        }
        $data = $data->get();
        return $data;
    }

    //                                  FUNCTIONS FOR GET TASK DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET ALL TASK DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getAllTaskCategory( $status = null ) {
        $data = TaskCategory::query();
        if ( $status ) {
            $data = $data->where( 'status', $status );
        }
        $data = $data->get();
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET SELECTED TASK DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getSelectedTask( $id ) {
        $data = Task::find( $id );
        return $data;
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TASK STATUS DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTaskStatus() {
        $data = TaskStatus::all();
        return $data;
    }


    //                                  FUNCTIONS FOR GET BANK DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET BANK DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function getBankDetails($is_active = null) {
        $data = BankAccount::query();
        if ($is_active !== null) {
            $data = $data->where('is_active', $is_active);
        }
        $data = $data->get();
        return $data;
    }

}
