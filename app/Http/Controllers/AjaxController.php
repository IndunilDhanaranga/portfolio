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

        // filter
        $project_filter = $request->columns[1]['search']['value'];
        $task_status_filter = $request->columns[2]['search']['value'];
        $task_category_filter = $request->columns[3]['search']['value'];
        $dev_filter = $request->columns[4]['search']['value'];
        $qa_filter = $request->columns[5]['search']['value'];
        $publisher_filter = $request->columns[6]['search']['value'];
        // $user_name_filter = $request->columns[0]['search']['value'];
        // filter

        // ordering
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

        // filter query
        if($project_filter != null){
            $query->where('project_id', $project_filter);
        }
        if($task_status_filter != null){
            $query->where('status', $task_status_filter);
        }
        if($task_category_filter != null){
            $query->where('task_category_id', $task_category_filter);
        }
        if($dev_filter != null){
            $query = $query->whereHas('taskTeamDetails', function ($data) use ($dev_filter) {
                $data->where('developer_id', $dev_filter);
            });
        }
        if($qa_filter != null){
            $query = $query->whereHas('taskTeamDetails', function ($data) use ($qa_filter) {
                $data->where('qa_id', $qa_filter);
            });
        }
        if($publisher_filter != null){
            $query = $query->whereHas('taskTeamDetails', function ($data) use ($publisher_filter) {
                $data->where('publisher_id', $publisher_filter);
            });
        }
        // filter query

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

            $task_progress = (100/10)*$value->status;
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

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION GET TODO
    ----------------------------------------------------------------------------------------------------------
    */

    public function getTodo(Request $request)
    {
        $query = Task::with('projectDetails','taskCategoryDetails','taskStatusDetails','taskTimeDetails','taskTeamDetails','taskAttachmentDetails','taskTeamDetails.devDetails','taskTeamDetails.qaDetails','taskTeamDetails.publisherDetails');

        // filter
        $project_filter = $request->columns[0]['search']['value'];
        $task_category_filter = $request->columns[3]['search']['value'];
        $status = $request->columns[7]['search']['value'];
        // return response()->json($project_filter);
        // $user_name_filter = $request->columns[0]['search']['value'];
        // filter

        // ordering
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

        // filter query
        if($project_filter != null){
            $query->where('project_id', $project_filter);
        }

        if($task_category_filter != null){
            $query->where('task_category_id', $task_category_filter);
        }
        if($status != null){
            if($status == 1){
                $query->where('status', 1);
                $query->orWhere('status', 2);
                $query->orWhere('status', 3);
            }else if($status == 2){
                $query->where('status', 4);
            }else if($status == 3){
                $query->where('status', 6);
                $query->orWhere('status', 7);
                $query->orWhere('status', 8);
            }else if($status == 4){
                $query->where('status', 7);
            }else if($status == 5){
                $query->where('status', 8);
            }
        }
        // filter query

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

            $attachment = '<ul class="list-inline">';

            foreach ($value->taskAttachmentDetails as $key2 => $item) {
                $attachment .= '<li class="list-inline-item">
                                    <a target="_blank" href="'.getUploadAttachment($item->attachment_name,'task_attachment').'"><i class="fa fa-image"></i></a>
                                </li>';
            }

            $attachment .= '</ul>';

            $query[$key]->attachments = $attachment;

            $query[$key]->status_badge = '<span class="badge badge-' . $value->taskStatusDetails->badge_class . '">' .$value->taskStatusDetails->title. '</span>';

            $action =  '<div class="btn-group">
                            <button type="button" class="btn btn-info">Action</button>
                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>';

            if($value->status == 1 ){
                $action .=  '<div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/3">Pause</a>
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/5">Test</a>
                            </div>';
            }else if($value->status == 2){
                $action .=  '<div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/3">Pause</a>
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/5">Test</a>
                            </div>';
            }else if($value->status == 3){
                $action .=  '<div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/2">Start</a>
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/5">Test</a>
                            </div>';
            }
            else if($value->status == 5){
                $action .=  '<div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/2">Start</a>
                                <a class="dropdown-item" href="/todo-status/'.$value->id.'/5">Test</a>
                            </div>';
            }
            $action .= '</div>';
            $query[$key]->action = $action;
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
