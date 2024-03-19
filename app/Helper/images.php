<?php

/*
----------------------------------------------------------------------------------------------------------
UPLOAD IMAGE
----------------------------------------------------------------------------------------------------------
*/

function uploadImage( $image, $disk )
 {
    $extension = 'webp';
    $name = $image->getClientOriginalName();
    $unique_name = md5( $name . time() );
    $full_name = $unique_name . '.' . $extension;

    Storage::disk( 'image' )->put( $disk.'/'.$full_name, File::get( $image ) );

    return $full_name;
}

/*
----------------------------------------------------------------------------------------------------------
GET UPLOAD IMAGE
----------------------------------------------------------------------------------------------------------
*/

function getUploadImage( $image, $disk )
 {

    if ( $image ) {
        $filePath = 'images/' .$disk.'/'. $image;
        $imageUrl =  config( 'site-specific.live-path' ) . '/uploads/' . $filePath;
        return $imageUrl;
    }
    return null;
}
