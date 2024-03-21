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
                ['title' => 'Expertise','permission'=>'expertise','show_in_sidebar'=>true],
                ['title' => 'Additional Details','permission'=>'additional-details','show_in_sidebar'=>true],
            )
        ],
        [
            'group'=>'Projects',
            'icon'=>'nav-icon fas fa-pen',
            'type'=>'multiple',
            'data'=>array(
                ['title' => 'Create Project','permission'=>'basic-details','show_in_sidebar'=>true],
                ['title' => 'Create Clients','permission'=>'education-qualification','show_in_sidebar'=>true],
                ['title' => 'View Projects','permission'=>'expertise','show_in_sidebar'=>true],
                ['title' => 'View Clients','permission'=>'additional-details','show_in_sidebar'=>true],
                ['title' => 'Project Types','permission'=>'project-type','show_in_sidebar'=>true],
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
        [
            'group'=>'Developer Tools',
            'icon'=>'nav-icon fas fa-pen',
            'type'=>'multiple',
            'data'=>array(
                ['title' => 'User','permission'=>'user','show_in_sidebar'=>true],
                ['title' => 'User Roll','permission'=>'user-roll','show_in_sidebar'=>true],
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
