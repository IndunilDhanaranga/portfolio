<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

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

class ActionController extends Controller {

    public function createBasicDetails( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'f_name' => 'required',
                'd_name' => 'required',
                'b_date' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'email' => 'required',
                'platform' => 'array|required',
                'link' => 'array|required',
                'icon' => 'array|required',
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
                $user_image = uploadImage( $request->user_image, 'user_image' );
                PortfolioUserImage::create( [
                    'user_id' => $portfolio_user->id,
                    'image_name' => $user_image
                ] );
            }
            if ( $request->has( 'cover_image' ) ) {
                $cover_image = uploadImage( $request->cover_image, 'cover_image' );
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

    public function createSchool( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'school' => 'array|required',
                'from' => 'array|required',
                'to' => 'array|required',
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

    public function createEducationLevel( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'title' => 'array|required',
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

    public function createEducationQualification( Request $request ) {
        try {

            $validator = Validator::make( $request->all(), [
                'school' => 'array|required',
                'title' => 'array|required',
                'description' => 'array|required',
                'education_level' => 'array|required',
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


    public function createExpertise( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'title' => 'array|required',
                'short_title' => 'array|required',
                'icon' => 'array|required',
                'description' => 'array|required',
            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            Expertise::truncate();
            DB::beginTransaction();

            foreach ( $request->title as $key => $value ) {
                Expertise::create( [
                    'title' => $value,
                    'short_title' => $request->short_title[ $key ],
                    'icon' => $request->icon[ $key ],
                    'description' => $request->description[ $key ],
                ] );
            }
            DB::commit();
            return redirect()->back()->with( [ 'success' => true, 'message' => 'Expertise Details Created Successfully !' ] );
        } catch ( \Throwable $th ) {
            DB::rollback();
            return redirect()->back()->with( [ 'error' => true, 'message' => $th->getMessage() ] );
        }
    }



    public function createAdditionalDetails( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'company' => 'array|required',
                'position' => 'array|required',
                'from' => 'array|required',
                'to' => 'array|required',

                'skill' => 'array|required',
                'percentage' => 'array|required',

                'languages' => 'array|required',
                'lang_percentage' => 'array|required',

            ] );

            if ( $validator->fails() ) {
                return redirect()->back()->with( [ 'error' => true, 'message' => implode( ' ', $validator->messages()->all() ) ] );
            }
            WorkExperience::truncate();
            DB::beginTransaction();

            foreach ( $request->company as $key => $value ) {
                WorkExperience::create( [
                    'company' => $value,
                    'position' => $request->position[ $key ],
                    'from' => $request->from[ $key ],
                    'to' => $request->to[ $key ],
                ] );
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

}
