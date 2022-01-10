<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    /**
     * Cac kich thuoc de resize anh.
     */
    'sizes' => [
        'thumbnail' => [150, 150],
        'medium' => [400, 400],
        'large' => [600, 600],
    ],

];
