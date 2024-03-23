<?php
use App\Models\UserRollPermission;

function getAllPermissions() {
    return array(
        [
            'group'=>'Dashboard',
            'icon'=>'nav-icon fas fa-tachometer-alt',
            'type'=>'single',
            'data'=>array(
                [ 'title' => 'Dashboard', 'permission'=>'dashboard', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Portfolio',
            'icon'=>'nav-icon fas fa-briefcase',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Basic Details', 'permission'=>'basic-details', 'show_in_sidebar'=>true ],
                [ 'title' => 'Education Qualification', 'permission'=>'education-qualification', 'show_in_sidebar'=>true ],
                [ 'title' => 'Expertise', 'permission'=>'expertise', 'show_in_sidebar'=>true ],
                [ 'title' => 'Additional Details', 'permission'=>'additional-details', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Task',
            'icon'=>'nav-icon fas fa-tasks',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Create Task', 'permission'=>'create-task', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Projects',
            'icon'=>'nav-icon fas fa-project-diagram',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Project', 'permission'=>'project', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Project', 'permission'=>'create-project', 'show_in_sidebar'=>true ],
                [ 'title' => 'Project Types', 'permission'=>'create-project-type', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Clients',
            'icon'=>'nav-icon fas fa-user-astronaut',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Clients', 'permission'=>'view-client', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Client', 'permission'=>'create-client', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Education',
            'icon'=>'nav-icon fas fa-graduation-cap',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Education Level', 'permission'=>'education-levels', 'show_in_sidebar'=>true ],
                [ 'title' => 'School & Collages', 'permission'=>'schools-collages', 'show_in_sidebar'=>true ],
            )
        ],
        [
            'group'=>'Developer Tools',
            'icon'=>'nav-icon fas fa-people-carry',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'User', 'permission'=>'user', 'show_in_sidebar'=>true ],
                [ 'title' => 'User Roll', 'permission'=>'user-roll', 'show_in_sidebar'=>true ],
            )
        ],
    );
}

if ( !function_exists( 'isPermissions' ) ) {
    function isPermissions( $permission ) {
        $UserPermissions = UserRollPermission::where( 'user_roll_id', Auth::user()->user_roll )->where( 'permission', $permission )->count( 'id' );
        if ( $UserPermissions == 1 ) {
            return true;
        }
        return false;
    }
}
