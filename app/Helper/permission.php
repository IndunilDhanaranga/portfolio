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
                [ 'title' => 'Nav Bar Details', 'permission'=>'get-navbar-details', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Todo List',
            'icon'=>'nav-icon fas fa-clipboard-check',
            'type'=>'single',
            'data'=>array(
                [ 'title' => 'Todo', 'permission'=>'todo', 'show_in_sidebar'=>true ],
                [ 'title' => 'Get Todo', 'permission'=>'get-todo', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Task',
            'icon'=>'nav-icon fas fa-tasks',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Task List', 'permission'=>'view-task', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Task', 'permission'=>'create-task', 'show_in_sidebar'=>true ],
                [ 'title' => 'Task Category', 'permission'=>'task-category', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Task Category', 'permission'=>'create-task-category', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Task Category', 'permission'=>'update-task-category', 'show_in_sidebar'=>false ],
                [ 'title' => 'Add Task', 'permission'=>'add-task', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Task', 'permission'=>'update-task', 'show_in_sidebar'=>false ],
                [ 'title' => 'Todo Status', 'permission'=>'todo-status', 'show_in_sidebar'=>false ],
                [ 'title' => 'Get Task', 'permission'=>'get-task', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Projects',
            'icon'=>'nav-icon fas fa-project-diagram',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Project List', 'permission'=>'project', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Project', 'permission'=>'create-project', 'show_in_sidebar'=>true ],
                [ 'title' => 'Project Types', 'permission'=>'create-project-type', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Project Types', 'permission'=>'add-project-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Project Types', 'permission'=>'update-project-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Add Project', 'permission'=>'add-project', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Project', 'permission'=>'update-project', 'show_in_sidebar'=>false ],
                [ 'title' => 'Get Technology', 'permission'=>'get-technology', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Clients',
            'icon'=>'nav-icon fas fa-user-astronaut',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Clients', 'permission'=>'view-client', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Client', 'permission'=>'create-client', 'show_in_sidebar'=>true ],
                [ 'title' => 'Add Client', 'permission'=>'add-client', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update Client', 'permission'=>'update-client', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'MailBox',
            'icon'=>'nav-icon fas fa-inbox',
            'type'=>'single',
            'data'=>array(
                [ 'title' => 'Mailbox', 'permission'=>'mailbox', 'show_in_sidebar'=>true ],
                [ 'title' => 'Get Client Message', 'permission'=>'client-message-get', 'show_in_sidebar'=>false ],
                [ 'title' => 'Client Message Read', 'permission'=>'client-message-markas-read', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Finance',
            'icon'=>'nav-icon fas fa-money-check-alt',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Income', 'permission'=>'view-income', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Income', 'permission'=>'view-create-income', 'show_in_sidebar'=>true ],
                [ 'title' => 'Expense Type', 'permission'=>'expense-types', 'show_in_sidebar'=>true ],
                [ 'title' => 'Income Type', 'permission'=>'income-types', 'show_in_sidebar'=>true ],
                [ 'title' => 'Bank Details', 'permission'=>'bank-account-details', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Bank Account', 'permission'=>'create-bank-account', 'show_in_sidebar'=>false ],
                [ 'title' => 'Edit Bank Account', 'permission'=>'edit-bank-account', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create Income Type', 'permission'=>'create-income-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Edit Income Type', 'permission'=>'edit-income-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create Expense Type', 'permission'=>'create-expense-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Edit Expense Type', 'permission'=>'edit-expense-type', 'show_in_sidebar'=>false ],
                [ 'title' => 'Add Income', 'permission'=>'create-income', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Portfolio Tools',
            'icon'=>'nav-icon fas fa-briefcase',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'Basic Details', 'permission'=>'basic-details', 'show_in_sidebar'=>true ],
                [ 'title' => 'Education Qualification', 'permission'=>'education-qualification', 'show_in_sidebar'=>true ],
                [ 'title' => 'Expertise', 'permission'=>'expertise', 'show_in_sidebar'=>true ],
                [ 'title' => 'Additional Details', 'permission'=>'additional-details', 'show_in_sidebar'=>true ],
                [ 'title' => 'Project Details', 'permission'=>'project-details', 'show_in_sidebar'=>true ],
                [ 'title' => 'Project Publication', 'permission'=>'project-publish', 'show_in_sidebar'=>true ],
                [ 'title' => 'Education Level', 'permission'=>'education-levels', 'show_in_sidebar'=>true ],
                [ 'title' => 'School & Collages', 'permission'=>'schools-collages', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create Basic Details', 'permission'=>'basic-details-create', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create Education Qualification', 'permission'=>'create-education-qualification', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create Expertise', 'permission'=>'create-expertise', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create Additional Details', 'permission'=>'create-additional-details', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create School', 'permission'=>'create-school', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create Education Level', 'permission'=>'create-education-level', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create Portfolio Project Details', 'permission'=>'portfolio-project-details', 'show_in_sidebar'=>false ],
                [ 'title' => 'Publish Project in Portfolio', 'permission'=>'portfolio-project-publish', 'show_in_sidebar'=>false ],
            )
        ],
        [
            'group'=>'Developer Tools',
            'icon'=>'nav-icon fas fa-people-carry',
            'type'=>'multiple',
            'data'=>array(
                [ 'title' => 'User', 'permission'=>'user', 'show_in_sidebar'=>true ],
                [ 'title' => 'User Roll', 'permission'=>'user-roll', 'show_in_sidebar'=>true ],
                [ 'title' => 'Create User Roll', 'permission'=>'create-user-roll', 'show_in_sidebar'=>false ],
                [ 'title' => 'Edit User Roll', 'permission'=>'edit-user-roll', 'show_in_sidebar'=>false ],
                [ 'title' => 'Update User Roll', 'permission'=>'update-user-roll', 'show_in_sidebar'=>false ],
                [ 'title' => 'Create User', 'permission'=>'create-user', 'show_in_sidebar'=>false ],
                [ 'title' => 'Edit User', 'permission'=>'edit-user', 'show_in_sidebar'=>false ],
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
