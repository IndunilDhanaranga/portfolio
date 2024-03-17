<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ViewController extends DataController
{
    public function frontend( ) {

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

        $data['css'] = $css;
        $data['script'] = $script;
        return view::make( 'front-end.home', $data );
    }
}
