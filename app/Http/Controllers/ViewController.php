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

        );

        $script = array(
            config( 'site-specific.jquery-init-js' ),
            config( 'site-specific.bootstrap-bundle-init-js' ),
            config( 'site-specific.bootstrap-affix-init-js' ),
            config( 'site-specific.isotope-package-init-js' ),
            config( 'site-specific.google-map' ),
            config( 'site-specific.johnedoe-init-js' ),
        );

        $data[ 'css' ] = $css;
        $data[ 'script' ] = $script;
        $data[ 'basic_details' ] = $this->getBasicDetails();
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
        return view::make( 'back-end.login' );
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
        return view::make( 'back-end.home', $data );
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
        ];

        return $this->default( $data );
    }

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

        return $this->default( $data );
    }

}
