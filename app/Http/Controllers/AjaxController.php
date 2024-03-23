<?php

namespace App\Http\Controllers;
use Validator;


use App\Models\Technology;

use Illuminate\Http\Request;

class AjaxController extends Controller {
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
}
