<?php

function getAllPermissions(){
    return array(
        [
            'group'=>'Dashboard',
            'icon'=>'nav-icon fas fa-tasks',
            'type'=>'single',
            'data'=>array(
                ['title' => 'Dashboard','permission'=>'dashboard','show_in_sidebar'=>true],
            )
        ],
        [
            'group'=>'Portfolio',
            'icon'=>'nav-icon fas fa-pen',
            'type'=>'multiple',
            'data'=>array(
                ['title' => 'Basic Details','permission'=>'basic-details','show_in_sidebar'=>true],
                ['title' => 'Education Qualification','permission'=>'education-qualification','show_in_sidebar'=>true],
            )
        ],
    );
}


if (!function_exists('isPermissions')) {
    function isPermissions($permission){
        // $UserPermissions = UserPermissions::where('role_id',Auth::user()->user_role,)->where('permission',$permission)->count();
        // if($UserPermissions == 1){
        //     return true;
        // }
            return true;
    }
}
