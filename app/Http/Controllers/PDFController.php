<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
use Carbon\Carbon;


class PDFController extends DataController {
    public function generatePDF() {
        $data[ 'title' ] = Auth::user();
        $pdf = PDF::loadView( 'pdf.mycv', $data );
        return $pdf->download( 'document.pdf' );
    }

    public function printPDF() {
        $data[ 'cv_details' ] = $this->getCVDetails();
        $data[ 'year' ] = Carbon::now()->year;        ;
        $pdf = PDF::loadView( 'pdf.mycv', $data );
        return $pdf->stream( 'document.pdf' );
        // return $data[ 'year' ];
    }
}
