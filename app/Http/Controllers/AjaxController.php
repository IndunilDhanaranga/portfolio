<?php

namespace App\Http\Controllers;
use Validator;


use App\Models\Technology;

use App\Models\UserImage;


use App\Models\Task;

use Illuminate\Http\Request;

class AjaxController extends Controller {


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TECHNOLOGY
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTechnology( Request $request ) {
        try {
            $validator = Validator::make( $request->all(), [
                'type_id' => 'required',
            ] );

            if ( $validator->fails() ) {
                return response()->json( [ 'icon' => 'error', 'msg' => $validator->messages()->first() ] );
            }
            $technology = Technology::where('project_type_id',$request->type_id)->get('technology');
            return response()->json( [ 'data' => $technology ] );
        } catch ( \Throwable $th ) {
            return response()->json( [ 'icon' => 'error', 'msg' => $th->getMessage() .' ' . $th->getLine() ] );
        }
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TASK
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTask(Request $request)
    {
        $query = Task::with('projectDetails','taskCategoryDetails','taskStatusDetails','taskTimeDetails','taskTeamDetails','taskAttachmentDetails','taskTeamDetails.devDetails','taskTeamDetails.qaDetails','taskTeamDetails.publisherDetails');


        // // ordering
        $column_index = $request->order[0]['column'];
        $order_dir = $request->order[0]['dir'];
        $columns = $request->columns;
        $column_name = $columns[$column_index]['data'];

        if ($column_name == 'project_details.title') {
            $column_name = 'project_id';
        }
        if ($column_name == 'project_details.title') {
            $column_name = 'project_id';
        }
        if ($column_name == 'task_category_details.category') {
            $column_name = 'task_category_id';
        }

        $query = $query->orderBy($column_name, $order_dir);
        // ordering end

        if ($request->has('search') && $request->search['value'] != null) {
            $search_value = $request->search['value'];
            $query = $query->where(function ($data) use ($search_value) {
                $data->orWhere('id', 'like', '%' . $search_value . '%')
                    ->orWhere('title', 'like', '%' . $search_value . '%')
                    ->orWhere('description', 'like', '%' . $search_value . '%')
                    ->orWhereHas('projectDetails', function ($data) use ($search_value) {
                        $data->where('title', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('taskCategoryDetails', function ($data) use ($search_value) {
                        $data->where('category', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('taskStatusDetails', function ($data) use ($search_value) {
                        $data->where('title', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('taskTeamDetails.devDetails', function ($data) use ($search_value) {
                        $data->where('name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('taskTeamDetails.qaDetails', function ($data) use ($search_value) {
                        $data->where('name', 'like', '%' . $search_value . '%');
                    })
                    ->orWhereHas('taskTeamDetails.publisherDetails', function ($data) use ($search_value) {
                        $data->where('name', 'like', '%' . $search_value . '%');
                    });
            });
        }

        $page = ($request->start / $request->length);
        $request->merge(['page' => $page]);
        if ($request->length != -1) {
            $query = $query->paginate($request->length);
        } else {
            $query = $query->paginate($query->count());
        }

        foreach ($query as $key => $value) {
            $dev_image_name = UserImage::where('user_id', $value->taskTeamDetails->developer_id)->latest()->first();
            $dev_image_link = getUploadImage($dev_image_name->image_name, 'user_image');
            $qa_image_name = UserImage::where('user_id', $value->taskTeamDetails->qa_id)->latest()->first();
            $qa_image_link = getUploadImage($qa_image_name->image_name, 'user_image');
            $publisher_image_name = UserImage::where('user_id', $value->taskTeamDetails->publisher_id)->latest()->first();
            $publisher_image_link = getUploadImage($publisher_image_name->image_name, 'user_image');
            $query[$key]->team_member = '<ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="img-circle" style="width: 50px;height: 40px;" src="' . $dev_image_link . '">
                                            </li>
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="img-circle" style="width: 50px;height: 40px;" src="' . $qa_image_link . '">
                                            </li>
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="img-circle" style="width: 50px;height: 40px;" src="' . $publisher_image_link . '">
                                            </li>
                                        </ul>';

            if ($value->taskTimeDetails->remaining_time < 0) {
                $remain_time = abs($value->taskTimeDetails->remaining_time);
                $class = 'danger';
                $text = 'exceed';
            } else {
                $remain_time = $value->taskTimeDetails->remaining_time;
                $class = 'success';
                $text = 'remaining';
            }

            $remain_min = $remain_time % 60;
            $remain_hour = floor($remain_time / 60);
            $min = $remain_min . ' Min';
            $hour = $remain_hour . ' H';

            $query[$key]->remaining_time = '<span class="badge badge-' . $class . '">' . $hour . ' ' . $min . ' ' . $text . '</span>';

            $task_progress = (100/8)*$value->status;
            if($value->status == 1){
                $task_progress = 1;
            }

            $query[$key]->progress = '<div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="'.$task_progress.'" aria-valuemin="0"
                                            aria-valuemax="100" style="width: '.$task_progress.'%">
                                        </div>
                                    </div>
                                    <small>
                                    '.$task_progress.'% Complete
                                    </small>';

            $attachment = '<ul class="list-inline">';

            foreach ($value->taskAttachmentDetails as $key2 => $item) {
                $attachment .= '<li class="list-inline-item">
                                    <a target="_blank" href="'.getUploadAttachment($item->attachment_name,'task_attachment').'"><i class="fa fa-image"></i></a>
                                </li>';
            }

            $attachment .= '</ul>';

            $query[$key]->attachments = $attachment;

            $query[$key]->status = '<span class="badge badge-' . $value->taskStatusDetails->badge_class . '">' .$value->taskStatusDetails->title. '</span>';

            $edit = '<a href="/edit-task/'.$value->id.'"><i class="far fa-edit"></i></a>';
            $query[$key]->action = $edit;
        }

        $paginated_list = json_decode(json_encode($query));
        $query = $query->map(function ($query) {
            return $query;
        })->all();

        $response['draw'] = $request->draw;
        $response['recordsFiltered'] = $paginated_list->total;
        $response['recordsTotal'] = $paginated_list->total;
        $response['data'] = $query;

        return response()->json($response);
    }
}
