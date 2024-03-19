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
        [
            'group'=>'Schools & Collages',
            'icon'=>'nav-icon fas fa-pen',
            'type'=>'single',
            'data'=>array(
                ['title' => 'School & Collages View','permission'=>'schools-collages','show_in_sidebar'=>true],
                ['title' => 'Education Qualification','permission'=>'education-qualification','show_in_sidebar'=>false],
            )
        ],
        [
            'group'=>'Education Levels',
            'icon'=>'nav-icon fas fa-pen',
            'type'=>'single',
            'data'=>array(
                ['title' => 'Education Level View','permission'=>'education-levels','show_in_sidebar'=>true],
                ['title' => 'Education Qualification','permission'=>'education-qualification','show_in_sidebar'=>false],
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
