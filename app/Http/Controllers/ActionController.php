<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Auth;

use App\Models\UserRoll;
use App\Models\UserRollPermission;
use App\Models\User;
use App\Models\UserImage;

use App\Models\PortfolioUser;
use App\Models\PortfolioUserConnection;
use App\Models\PortfolioUserImage;
use App\Models\PortfolioCoverImage;
use App\Models\SchoolAndCollage;
use App\Models\EducationLevel;
use App\Models\EducationQualification;
use App\Models\Expertise;
use App\Models\WorkExperience;
use App\Models\Skills;
use App\Models\Languages;

use App\Models\ProjectType;
use App\Models\Technology;
use App\Models\ProjectClient;
use App\Models\Project;
use App\Models\ProjectImage;

use App\Models\TaskCategory;
use App\Models\Task;
use App\Models\TaskTime;
use App\Models\TaskTeam;
use App\Models\TaskAttachment;

class ActionController extends Controller {

    //                                      FUNCTIONS FOR DEVELOPER TOOLS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function createUserRoll( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'user_roll'     => 'required',
                'permission.*'     => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $user_roll = UserRoll::create( [
                'title'         => $request->user_roll,
                'is_active'     => 1,
            ] );

            foreach ( $request->permission as $key => $value ) {
                UserRollPermission::create( [
                    'user_roll_id'       => $user_roll->id,
                    'permission'    => $value,
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'User Roll Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function createUser( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'name'          => 'required',
                'email'         => 'required',
                'user_roll'     => 'required',
                'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'password'      => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();

            $user = User::create( [
                'name'          => $request->name,
                'email'         => $request->email,
                'user_roll'     => $request->user_roll,
                'password'      => $request->password,
            ] );

            $user_image = uploadImage( $request->image, 'user_image' );

            UserImage::create( [
                'user_id'       => $user->id,
                'image_name'    => $user_image,
            ] );

            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'User Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER ROLL
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateUserRoll( Request $request, $id ) {
        try {
            // return $request;
            $validator = Validator::make( $request->all(), [
                'user_roll'         => 'required',
                'is_active'         => 'required',
                'permission.*'        => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            DB::beginTransaction();
            $user_roll              = UserRoll::find( $id );
            $user_roll->title       = $request->user_roll;
            $user_roll->is_active   = $request->is_active;
            $user_roll->save();

            UserRollPermission::where( 'user_roll_id', $id )->delete();

            foreach ( $request->permission as $key => $value ) {
                UserRollPermission::create( [
                    'user_roll_id'       => $id,
                    'permission'    => $value,
                ] );
            }

            DB::commit();
            return redirect()->route( 'user-roll' )->with( [ 'success' => true, 'message' => 'User Roll Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE USER
    ----------------------------------------------------------------------------------------------------------
    */

    public function editUser( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id'            => 'required',
                'name'          => 'required',
                'email'         => 'required',
                'user_roll'     => 'required',
                'is_active'     => 'required',
                'password'      => 'required_if:password-change,"on"',
            ],
            [
                'password.required_if' => 'The Password field is required when Password Change Check box Checked.',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            if ( $request->id == Auth::id() ) {
                // return redirect()->back()->with( [ 'error' => true, 'message' => 'This is you !' ] );
            }
            DB::beginTransaction();
            $user                     = User::find( $request->id );
            $user->name       = $request->name;
            $user->email   = $request->email;
            $user->user_roll   = $request->user_roll;
            $user->is_active   = $request->is_active;
            if ( $request->password ) {
                $user->password = $request->password;
            }
            $user->save();
            if ( $request->hasFile( 'image' ) ) {
                $user_image = uploadImage( $request->image, 'user_image' );
                $user_image_table = UserImage::where( 'user_id', $request->id )->first();
                $user_image_table->image_name = $user_image;
                $user_image_table->save();
            }

            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'User Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //                                  FUNCTIONS FOR PORTFOLIO DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE BASIC DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createBasicDetails( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'f_name' => 'required',
                'd_name' => 'required',
                'b_date' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'email' => 'required',
                'platform.*' => 'required',
                'link.*' => 'required',
                'icon.*' => 'required',
                'm_path' => 'required',
                'caption' => 'required',
                'about' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            PortfolioUser::truncate();
            PortfolioUserConnection::truncate();
            if ( $request->has( 'user_image' ) ) {
                PortfolioUserImage::truncate();
            }
            if ( $request->has( 'cover_image' ) ) {
                PortfolioCoverImage::truncate();
            }
            DB::beginTransaction();
            $portfolio_user = PortfolioUser::create( [
                'f_name' => $request->f_name,
                'd_name' => $request->d_name,
                'b_date' => $request->b_date,
                'p_number' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'm_path' => $request->m_path,
                'caption' => $request->caption,
                'about' => $request->about,
            ] );

            foreach ( $request->platform as $key => $value ) {
                PortfolioUserConnection::create( [
                    'user_id' => $portfolio_user->id,
                    'platform' => $value,
                    'link' => $request->link[ $key ],
                    'icon' => $request->icon[ $key ],
                ] );
            }
            if ( $request->has( 'user_image' ) ) {
                $user_image = uploadImage( $request->user_image, 'portfolio_user_image' );
                PortfolioUserImage::create( [
                    'user_id' => $portfolio_user->id,
                    'image_name' => $user_image
                ] );
            }
            if ( $request->has( 'cover_image' ) ) {
                $cover_image = uploadImage( $request->cover_image, 'portfolio_cover_image' );
                PortfolioCoverImage::create( [
                    'user_id' => $portfolio_user->id,
                    'image_name' => $cover_image
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Basic Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE SCHOOLS DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createSchool( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'school.*' => 'required',
                'from.*' => 'required',
                'to.*' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            SchoolAndCollage::truncate();
            DB::beginTransaction();

            foreach ( $request->school as $key => $value ) {
                SchoolAndCollage::create( [
                    'title' => $value,
                    'from' => $request->from[ $key ],
                    'to' => $request->to[ $key ],
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'School Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE EDUCATION LEVEL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createEducationLevel( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'title.*' => 'required',
                'year' => 'required_if:is_completed,0|array',
                'indexno' => 'required_if:is_completed,0|array',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            EducationLevel::truncate();
            DB::beginTransaction();

            foreach ( $request->title as $key => $value ) {
                EducationLevel::create( [
                    'title' => $value,
                    'is_completed' => $request->is_completed[ $key ],
                    'end_year' => $request->has( 'year' ) ? $request->year[ $key ] : null,
                    'index_no' => $request->has( 'indexno' ) ? $request->indexno[ $key ] : null,
                ] );
            }

            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Education Level Created Successfully!' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE EDUCATION QUALIFICATION DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createEducationQualification( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'school.*' => 'required',
                'title.*' => 'required',
                'description.*' => 'required',
                'education_level.*' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            EducationQualification::truncate();
            DB::beginTransaction();
            foreach ( $request->title as $key => $value ) {
                EducationQualification::create( [
                    'title' => $value,
                    'education_level' => $request->education_level[ $key ],
                    'school' => $request->school[ $key ],
                    'description' => $request->description[ $key ],
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Education Qualification Created Successfully!' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE EXPERTISE DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createExpertise( Request $request ) {
        try {
            if ( $request->title ) {
                $validator = Validator::make( $request->all(), [
                    'title.*' => 'required',
                    'short_title.*' => 'required',
                    'icon.*' => 'required',
                    'description.*' => 'required',
                ] );
                if ( $validator->fails() ) {
                    return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
                }
            }

            Expertise::truncate();
            DB::beginTransaction();

            if ( $request->title ) {
                foreach ( $request->title as $key => $value ) {
                    Expertise::create( [
                        'title' => $value,
                        'short_title' => $request->short_title[ $key ],
                        'icon' => $request->icon[ $key ],
                        'description' => $request->description[ $key ],
                    ] );
                }
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Expertise Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE ADDITIONAL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function createAdditionalDetails( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                // 'company.*' => 'required',
                // 'position.*' => 'required',
                // 'from.*' => 'required',
                // 'to.*' => 'required',

                'skill.*' => 'required',
                'percentage.*' => 'required',

                'languages.*' => 'required',
                'lang_percentage.*' => 'required',

            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            WorkExperience::truncate();
            Skills::truncate();
            Languages::truncate();
            DB::beginTransaction();

            if ( $request->company ) {
                foreach ( $request->company as $key => $value ) {
                    WorkExperience::create( [
                        'company' => $value,
                        'position' => $request->position[ $key ],
                        'from' => $request->from[ $key ],
                        'to' => $request->to[ $key ],
                    ] );
                }
            }
            foreach ( $request->skill as $key => $value ) {
                Skills::create( [
                    'skill' => $value,
                    'percentage' => $request->percentage[ $key ],
                ] );
            }
            foreach ( $request->languages as $key => $value ) {
                Languages::create( [
                    'languages' => $value,
                    'percentage' => $request->lang_percentage[ $key ],
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Additional Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //                                  FUNCTIONS FOR PROJECT DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE PROJECT TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function addProjectTypes( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'project_type' => 'required',
                'technologies.*' => 'required'
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();
            $project_type = ProjectType::create( [
                'type' => $request->project_type
            ] );
            foreach ( $request->technologies as $key => $value ) {
                Technology::create( [
                    'project_type_id'   => $project_type->id,
                    'technology'        => $value,
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Project Type Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE PROJECT TYPE
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateProjectTypes( Request $request, $id ) {
        try {
            $validator = Validator::make( $request->all(), [
                'project_type' => 'required',
                'technologies.*' => 'required'
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();

            $project_type = ProjectType::find( $id );
            $project_type->type = $request->project_type;
            $project_type->save();
            Technology::where( 'project_type_id', $id )->delete();
            foreach ( $request->technologies as $key => $value ) {
                Technology::create( [
                    'project_type_id'   => $project_type->id,
                    'technology'        => $value,
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Project Type Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE PROJECT
    ----------------------------------------------------------------------------------------------------------
    */

    public function addProject( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'title' => 'required',
                'type_id' => 'required',
                'client_id' => 'required',
                'estimate' => 'required',
                'repository' => 'required',
                'description' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();
            $project = Project::create( [
                'title' => $request->title,
                'type_id' => $request->type_id,
                'client_id' => $request->client_id,
                'estimate' => $request->estimate,
                'repository' => $request->repository,
                'description' => $request->description,
                'status' => 1,
            ] );
            if ( $request->hasFile( 'image' ) ) {
                foreach ( $request->file( 'image' ) as $key => $value ) {
                    $project_image = uploadImage( $value, 'project_image' );
                    ProjectImage::create( [
                        'project_id'       => $project->id,
                        'image_name'    => $project_image,
                    ] );
                }
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Project Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE PROJECT
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateProject( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id' => 'required',
                'title' => 'required',
                'type_id' => 'required',
                'client_id' => 'required',
                'estimate' => 'required',
                'repository' => 'required',
                'description' => 'required',
                'status' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();
            $project = Project::find( $request->id );
            $project->title = $request->title;
            $project->type_id = $request->type_id;
            $project->client_id = $request->client_id;
            $project->estimate = $request->estimate;
            $project->repository = $request->repository;
            $project->description = $request->description;
            $project->status = $request->status;
            $project->save();
            if ( $request->hasFile( 'image' ) ) {
                ProjectImage::where( 'project_id', $request->id )->delete();
                foreach ( $request->file( 'image' ) as $key => $value ) {
                    $project_image = uploadImage( $value, 'project_image' );
                    ProjectImage::create( [
                        'project_id'       => $request->id,
                        'image_name'    => $project_image,
                    ] );
                }
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Project Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //                                  FUNCTIONS FOR CLIENT DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE CLIENT
    ----------------------------------------------------------------------------------------------------------
    */

    public function addClient( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();
            $project_client = ProjectClient::create( [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
            ] );
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Client Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE CLIENT
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateClient( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();
            $project_client = ProjectClient::find( $request->id );
            $project_client->name = $request->name;
            $project_client->email = $request->email;
            $project_client->address = $request->address;
            $project_client->phone = $request->phone;
            $project_client->is_active = $request->is_active;
            $project_client->save();
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Client Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    //                                  FUNCTIONS FOR TASK DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE TASK CATEGORY
    ----------------------------------------------------------------------------------------------------------
    */

    public function createTaskCategory( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'category' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();
            $task_category = TaskCategory::create( [
                'category' => $request->category,
            ] );
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Task Category Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION UPDATE TASK CATEGORY
    ----------------------------------------------------------------------------------------------------------
    */

    public function updateTaskCategory( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'id' => 'required',
                'category' => 'required',
                'status' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            DB::beginTransaction();
            $task_category = TaskCategory::find($request->id);
            $task_category->category = $request->category;
            $task_category->status = $request->status;
            $task_category->save();
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Task Category Updated Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION CREATE TASK
    ----------------------------------------------------------------------------------------------------------
    */

    public function addTask( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'project_id' => 'required',
                'task_category_id' => 'required',
                'title' => 'required',
                'hours' => 'required',
                'min' => 'required',
                'description' => 'required',
                'developer' => 'required',
                'qa' => 'required',
                'live' => 'required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }

            $allowcated_time = (($request->hours * 60) + $request->min);

            DB::beginTransaction();
            $task = Task::create( [
                'project_id' => $request->project_id,
                'task_category_id' => $request->task_category_id,
                'title' => $request->title,
                'description' => $request->description,
            ] );
            $task_time = TaskTime::create([
                'task_id' => $task->id,
                'remaining_time' => $allowcated_time,
                'allowcated_full_time' => $allowcated_time,
            ]);
            $task_team = TaskTeam::create([
                'task_id' => $task->id,
                'developer_id' => $request->developer,
                'qa_id' => $request->qa,
                'publisher_id' => $request->live,
            ]);
            if ( $request->hasFile( 'image' ) ) {
                foreach ( $request->file( 'image' ) as $key => $attachment ) {
                    $task_attachment = uploadAttachment( $attachment, 'task_attachment' );
                    TaskAttachment::create( [
                        'task_id'       => $task->id,
                        'attachment_name'    => $task_attachment,
                    ] );
                }
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Task Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }

}
