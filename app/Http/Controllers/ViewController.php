<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewController extends DataController {

    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */
    /*FRONT-END */
    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */

    /*
    ----------------------------------------------------------------------------------------------------------------------------------
    START FRONT-END VIEW
    ----------------------------------------------------------------------------------------------------------------------------------
    */

    public function frontend() {

        $css = array(
            config( 'site-specific.themify-icons-css' ),
            config( 'site-specific.johndoe-css' ),
            config( 'site-specific.fontawesome-css' ),
            config( 'site-specific.sweetalert-css' ),
            config( 'site-specific.toastr-css' ),
            config( 'site-specific.custom-css' ),
        );

        $script = array(
            config( 'site-specific.jquery-init-js' ),
            config( 'site-specific.bootstrap-bundle-init-js' ),
            config( 'site-specific.bootstrap-affix-init-js' ),
            config( 'site-specific.isotope-package-init-js' ),
            // config( 'site-specific.google-map' ),
            config( 'site-specific.johnedoe-init-js' ),
            config( 'site-specific.sweetalert2-js' ),
            config( 'site-specific.toastr-js' ),
            config( 'site-specific.custom-init-js' ),

        );
        $data['site_settings'] = $this->getSiteSettings();
        $data[ 'css' ] = $css;
        $data[ 'script' ] = $script;
        $data[ 'basic_details' ] = $this->getBasicDetails();
        $data[ 'education' ] = $this->getEducationQualification();
        $data[ 'expertise' ] = $this->getExpertise();
        $data[ 'skills' ] = $this->getSkills();
        $data[ 'languages' ] = $this->getLanguages();
        $data[ 'work_experience' ] = $this->getWorkExperience();
        $data[ 'details' ] = $this->getDetailsForPortfolio();
        $data[ 'my_service' ] = null;
        $data[ 'pricing' ] = null;
        $data[ 'freelance' ] = null;
        $data[ 'news' ] = null;
        // return $data[ 'project_details' ];
        return view::make( 'front-end.home', $data );
    }
    /*
    ----------------------------------------------------------------------------------------------------------------------------------
    END FRONT-END VIEW
    ----------------------------------------------------------------------------------------------------------------------------------
    */

    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */
    /*BACK-END */
    /*---------------------------------------------------------------------------------------------------------------------------------------------------------- */

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW LOGIN
    ----------------------------------------------------------------------------------------------------------
    */

    public function login() {
        $data['site_settings'] = $this->getSiteSettings();
        return view::make( 'back-end.login',$data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW DEFAULT
    ----------------------------------------------------------------------------------------------------------
    */

    public function default( $data ) {

        $css = array(
            config( 'site-specific.google-font-css' ),
            config( 'site-specific.all-min-css' ),
            config( 'site-specific.icon-min-css' ),
            config( 'site-specific.tempusdominus-bootstrap-min-css' ),
            config( 'site-specific.icheck-bootstrap-min-css' ),
            config( 'site-specific.jqvmap-min-css' ),
            config( 'site-specific.adminlte-min-css' ),
            config( 'site-specific.OverlayScrollbars-min-css' ),
            config( 'site-specific.daterangepicker-min-css' ),
            config( 'site-specific.summernote-min-css' ),
            config( 'site-specific.sweetalert-css' ),
            config( 'site-specific.toastr-css' ),
            config( 'site-specific.select2-css' ),
            config( 'site-specific.select2-bootstrap4-css' ),
            config( 'site-specific.dropify-css' ),
        );

        $script = array(
            config( 'site-specific.jquery-min-js' ),
            config( 'site-specific.jquery-ui-min-js' ),
            config( 'site-specific.bootstrap-bundle-min-js' ),
            config( 'site-specific.Chart-min-js' ),
            // config( 'site-specific.sparkline-min-js' ),
            config( 'site-specific.jquery-vmap-min-js' ),
            config( 'site-specific.jquery-vmap-usa-min-js' ),
            config( 'site-specific.jquery-knob-min-js' ),
            config( 'site-specific.moment-min-js' ),
            config( 'site-specific.daterangepicker-min-js' ),
            config( 'site-specific.tempusdominus-bootstrap-min-js' ),
            config( 'site-specific.summernote-min-js' ),
            config( 'site-specific.jquery-overlayScrollbars-min-js' ),
            config( 'site-specific.adminlte-min-js' ),
            config( 'site-specific.sweetalert2-js' ),
            config( 'site-specific.toastr-js' ),
            config( 'site-specific.select2-js' ),
            config( 'site-specific.tooltip-core' ),
            config( 'site-specific.tooltip-dom' ),
            config( 'site-specific.dropify-init-js' ),
        );

        if ( isset( $data[ 'css' ] ) ) {
            $data[ 'css' ]    = array_merge( $css, $data[ 'css' ] );
        } else {
            $data[ 'css' ]    = $css;
        }
        if ( isset( $data[ 'script' ] ) ) {
            $data[ 'script' ] = array_merge( $script, $data[ 'script' ] );
        } else {
            $data[ 'script' ] = $script;
        }
        $data['site_settings'] = $this->getSiteSettings();
        return view::make( 'back-end.home', $data );
    }


     /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW BANK STATEMENT
    ----------------------------------------------------------------------------------------------------------
    */

    public function siteSettings() {
        $data = [
            'title'         => 'Site Settings',
            'view'          => 'back-end.site-settings',
            'site_settings' => $this->getSiteSettings(),
        ];
        // return $data[ 'site_settings' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW DASHBOARD
    ----------------------------------------------------------------------------------------------------------
    */

    public function dashboard() {
        $data = [
            'title' => 'Dashboard',
            'view' => 'back-end.dashboard',
            'script'    => array( config( 'site-specific.dashboard-init-js' ),
                             ),
            'dashboard_data' => $this->getDashboardData(),
        ];
        // return $data['dashboard_data'];
        return $this->default( $data );
    }

    //                                                  FUNCTIONS FOR VIEW DEVELOPER TOOL

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION USER ROLL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function userRoll() {
        $data = [
            'title'     => 'User Roll',
            'view'      => 'back-end.user-roll',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.user-roll-init-js' )
                             ),
            'user_roll' => $this->getUserRoll(),
        ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION EDIT USER ROLL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function editUserRoll($id) {
        $data = [
            'title'                 => 'Edit User Roll',
            'view'                  => 'back-end.edit-user-roll',
            'script'                => array(config('site-specific.edit-user-roll-init-js')),
            'user_roll'             => $this->getUserRollForEdit($id),
            'user_roll_permission'  => $this->getSelectedUserRollPermission($id),
        ];
        // return $data['user_roll'];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION USER DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function userDetails() {
        $data = [
            'title'     => 'User',
            'view'      => 'back-end.user',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.user-init-js' )
                             ),
            'user_roll' => $this->getUserRoll(1),
            'user'      => $this->getUser(),
        ];
        return $this->default( $data );
    }



    //                                          FUNCTIONS FOR VIEW PORTFOLIO DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW BASIC DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function basicDetails() {
        $data = [
            'title' => 'Basic Details',
            'view' => 'back-end.basic-details',
            'basic_details' => $this->getBasicDetails(),
            'css'   => array( config('site-specific.summernote-min-css')),
            'script' => array( config( 'site-specific.basic-details-init-js' ) ),
        ];
        // return $data[ 'basic_details' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW SCHOOLS & COLLAGES
    ----------------------------------------------------------------------------------------------------------
    */

    public function schoolCollages() {
        $data = [
            'title' => 'Schools & Collages',
            'view' => 'back-end.schools-collages',
            'school_details' => $this->getSchoolDetails(),
            'script' => array( config( 'site-specific.schools-collages-init-js' ) ),
        ];

        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EDUCATION LEVELS
    ----------------------------------------------------------------------------------------------------------
    */

    public function educationLevels() {
        $data = [
            'title' => 'Education Levels',
            'view' => 'back-end.education-levels',
            'education_level' => $this->getEducationLevel(),
            'script' => array( config( 'site-specific.education-levels-init-js' ) ),
        ];

        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EDUCATION QUALIFICATION
    ----------------------------------------------------------------------------------------------------------
    */

    public function educationQualification() {
        $data = [
            'title' => 'Education Qualification',
            'view' => 'back-end.education-qualification',
            'education_level' => $this->getEducationLevel(),
            'school_details' => $this->getSchoolDetails(),
            'education_qualification' => $this->getEducationQualification(),
            'script' => array( config( 'site-specific.education-qualification-init-js' ) ),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EXPERTISE
    ----------------------------------------------------------------------------------------------------------
    */

    public function expertiseView() {
        $data = [
            'title' => 'Expertise',
            'view' => 'back-end.expertise',
            'expertise' => $this->getExpertise(),
            'script' => array( config( 'site-specific.expertise-init-js' ) ),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW ADDITIONAL DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function additionalDetails() {
        $data = [
            'title' => 'Additional Details',
            'view' => 'back-end.additional-details',
            'skills' => $this->getSkills(),
            'languages' => $this->getLanguages(),
            'work_experience' => $this->getWorkExperience(),
            'css'   => array( config('site-specific.summernote-min-css')),
            'script' => array( config( 'site-specific.additional-details-init-js' ) ),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function projectDetails() {
        $data = [
            'title' => 'Project Details',
            'view' => 'back-end.project-details',
            'project' => $this->getProject(),
            'script' => array( config( 'site-specific.additional-details-init-js' ) ),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW PROJECT DETAILS
    ----------------------------------------------------------------------------------------------------------
    */

    public function projectPublish() {
        $data = [
            'title' => 'Project Publication',
            'view' => 'back-end.project-publish',
            'project' => $this->getProjectsDetailsForPublished(),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.project-publish-init-js' )
                             ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }





    //                                          FUNCTIONS FOR VIEW PROJECT DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW PROJECT TYPES
    ----------------------------------------------------------------------------------------------------------
    */

    public function createProjectTypes() {
        $data = [
            'title' => 'Project Types',
            'view' => 'back-end.project-type',
            'project_type' => $this->getProjectType(),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.project-type-init-js' )
                             ),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW CREATE PROJECT
    ----------------------------------------------------------------------------------------------------------
    */

    public function createProject() {
        $data = [
            'title' => 'Create Project',
            'view' => 'back-end.create-project',
            'project_type' => $this->getProjectType(),
            'all_clients' => $this->getAllClients(1),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW PROJECT
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewProject() {
        $data = [
            'title' => 'Project',
            'view' => 'back-end.view-project',
            'project' => $this->getProject(),
            'project_type' => $this->getProjectType(),
            'project_status' => $this->getProjectStatus(),
            'all_clients' => $this->getAllClients(1),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.project-init-js' )
                             ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }


     //                                          FUNCTIONS FOR VIEW CLIENT DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW CREATE CLIENT
    ----------------------------------------------------------------------------------------------------------
    */

    public function createClient() {
        $data = [
            'title' => 'Create Client',
            'view' => 'back-end.create-client',
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW CLIENT
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewClient() {
        $data = [
            'title' => 'Clients',
            'view' => 'back-end.view-client',
            'all_clients' => $this->getAllClients(),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.project-client-init-js' )
                             ),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    //                                          FUNCTIONS FOR VIEW TASK DETAILS

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW TASK CATEGORY
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewTaskCategory() {
        $data = [
            'title' => 'Task Category',
            'view' => 'back-end.task-category',
            'task_category' => $this->getAllTaskCategory(),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.task-category-init-js' )
                             ),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW CREATE TASK
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewCreateTask() {
        $data = [
            'title' => 'Create Tasks',
            'view' => 'back-end.create-task',
            'project' => $this->getProject(),
            'task_category' => $this->getAllTaskCategory(1),
            'users' => $this->getUser(1),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW TASK
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewTask() {
        $data = [
            'title' => 'Tasks',
            'view' => 'back-end.view-task',
            'project' => $this->getProject(),
            'users' => $this->getUser(1),
            'task_status' => $this->getTaskStatus(),
            'task_category' => $this->getAllTaskCategory(1),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.task-list-init-js' )
                             ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EDIT TASK
    ----------------------------------------------------------------------------------------------------------
    */

    public function editTask($id) {
        $data = [
            'title' => 'Edit Tasks',
            'view' => 'back-end.edit-task',
            'project' => $this->getProject(),
            'task_category' => $this->getAllTaskCategory(1),
            'users' => $this->getUser(1),
            'task' => $this->getSelectedTask($id),
            'task_status' => $this->getTaskStatus(),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW TODO LIST
    ----------------------------------------------------------------------------------------------------------
    */

    public function todoList() {
        $data = [
            'title' => 'Todo List',
            'view' => 'back-end.view-todo',
            'project' => $this->getProject(),
            'task_category' => $this->getAllTaskCategory(1),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                config( 'site-specific.pdfmake-min-js' ),
                                config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                config( 'site-specific.todo-list-init-js' )
                             ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW MAILBOX
    ----------------------------------------------------------------------------------------------------------
    */

    public function mailBox() {
        $data = [
            'title' => 'Mail Box',
            'view' => 'back-end.mail-box',
            'project' => $this->getProject(),
            'task_category' => $this->getAllTaskCategory(1),
            'script'    => array( config( 'site-specific.mail-box-init-js' ) ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }


    //                                          FUNCTIONS FOR VIEW FINANCE DETAILS


     /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW BANK ACCOUNT
    ----------------------------------------------------------------------------------------------------------
    */

    public function bankAccountDetails() {
        $data = [
            'title' => 'Bank Details',
            'view' => 'back-end.bank-account',
            'bank_details' => $this->getBankDetails(),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                            config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                    config( 'site-specific.pdfmake-min-js' ),
                                    config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                    config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                    config( 'site-specific.bank-account-init-js' )
                                    ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW INCOME TYPES
    ----------------------------------------------------------------------------------------------------------
    */

    public function incomeTypes() {
        $data = [
            'title' => 'Income Types',
            'view' => 'back-end.income-types',
            'income_type' => $this->getIncomeType(),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                            config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                    config( 'site-specific.pdfmake-min-js' ),
                                    config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                    config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                    config( 'site-specific.income-types-init-js' )
                                    ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }

     /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EXPENSE TYPES
    ----------------------------------------------------------------------------------------------------------
    */

    public function expenseTypes() {
        $data = [
            'title' => 'Expense Types',
            'view' => 'back-end.expense-types',
            'expense_type' => $this->getExpenseType(),
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                            config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                    config( 'site-specific.pdfmake-min-js' ),
                                    config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                    config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                    config( 'site-specific.expense-types-init-js' )
                                    ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }


    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW CREATE INCOME
    ----------------------------------------------------------------------------------------------------------
    */

    public function createIncome() {
        $data = [
            'title' => 'Create Income',
            'view' => 'back-end.create-income',
            'income_type' => $this->getIncomeType(1),
            'project' => $this->getProject(),
            'bank_details' => $this->getBankDetails(1),
            'script'    => array(config('site-specific.create-income-init-js')),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW INCOME
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewIncome() {
        $data = [
            'title' => 'Income',
            'view' => 'back-end.income',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                    config( 'site-specific.pdfmake-min-js' ),
                                    config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                    config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                    config( 'site-specific.income-init-js' )
                                ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EDIT INCOME
    ----------------------------------------------------------------------------------------------------------
    */

    public function editIncome($id) {
        $data = [
            'title' => 'Edit Income',
            'view' => 'back-end.edit-income',
            'income_type' => $this->getIncomeType(1),
            'project' => $this->getProject(),
            'bank_details' => $this->getBankDetails(1),
            'income_details' => $this->getIncomeForEdit($id),
            'script'    => array(config('site-specific.create-income-init-js')),
        ];
        // return $data[ 'income_details' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW CREATE EXPENSE
    ----------------------------------------------------------------------------------------------------------
    */

    public function createExpense() {
        $data = [
            'title' => 'Create Expense',
            'view' => 'back-end.create-expense',
            'expense_type' => $this->getExpenseType(1),
            'bank_details' => $this->getBankDetails(1),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EXPENSE
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewExpense() {
        $data = [
            'title' => 'Expense',
            'view' => 'back-end.expense',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                    config( 'site-specific.pdfmake-min-js' ),
                                    config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                    config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                    config( 'site-specific.expense-init-js' )
                                ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW EDIT EXPENSE
    ----------------------------------------------------------------------------------------------------------
    */

    public function editExpense($id) {
        $data = [
            'title' => 'Edit Expense',
            'view' => 'back-end.edit-expense',
            'expense_type' => $this->getExpenseType(1),
            'bank_details' => $this->getBankDetails(1),
            'expense_details' => $this->getExpenseDetails($id),
        ];
        // return $data[ 'education_qualification' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW BANK STATEMENT
    ----------------------------------------------------------------------------------------------------------
    */

    public function bankStatement() {
        $data = [
            'title' => 'Bank Statement',
            'view' => 'back-end.bank-statement',
            'css'       => array( config( 'site-specific.datatable-bootstrap-min-css' ), config( 'site-specific.responsive-bootstrap-min-css' ),
                                config( 'site-specific.buttons-bootstrap-min-css' ) ),
            'script'    => array( config( 'site-specific.jquery-datatable-min-js' ), config( 'site-specific.datatable-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-responsive-min-js' ),config( 'site-specific.responsive-bootstrap-min-js' ),
                                    config( 'site-specific.datatable-buttons-min-js' ),config( 'site-specific.buttons-bootstrap-min-js' ),
                                    config( 'site-specific.pdfmake-min-js' ),
                                    config( 'site-specific.vfs_fonts-min-js' ),config( 'site-specific.buttons-html5-min-js' ),
                                    config( 'site-specific.buttons-print-min-js' ),config( 'site-specific.buttons-colvis-min-js' ),
                                    config( 'site-specific.bank-statement-init-js' )
                                ),
        ];
        // return $data[ 'project' ];
        return $this->default( $data );
    }

    /*
    ----------------------------------------------------------------------------------------------------------
    PUBLIC FUNCTION VIEW TRANSACTION
    ----------------------------------------------------------------------------------------------------------
    */

    public function viewTransaction($transaction_id,$transaction_type) {
        $data = [
            'title' => 'Transaction Details',
            'view' => 'back-end.view-transaction',
            'transaction_details' => $this->getTransaction($transaction_id,$transaction_type),
        ];
        // return $data[ 'transaction_details' ];
        return $this->default( $data );
    }

}
