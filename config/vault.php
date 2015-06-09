<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Minutes to cache
    |--------------------------------------------------------------------------
    |
    | The selection of minutes text can be cached for
    |
    */

    'minutes' => [
        '60'     => trans('vault.hour', ['hour' => 1]),
        '720'    => trans('vault.hours', ['hours' => 12]),
        '1440'   => trans('vault.hours', ['hours' => 24]),
        '2880'   => trans('vault.hours', ['hours' => 48]),
        '10080'  => trans('vault.days', ['days' => 7]),
        '20160'  => trans('vault.days', ['days' => 14]),
        '43200'  => trans('vault.days', ['days' => 30]),
    ],

    /*
    |--------------------------------------------------------------------------
    | Max text size (in bytes)
    |--------------------------------------------------------------------------
    |
    | Generally PasteVault is designed to store small bits of text so don't allow
    | text larger than this. Note, this limit is checked after the text has been
    | encrypted and base 64 encoded client side which means is't significantly
    | larger than the original text entered by the user.
    |
    */

    'max_size' => 32000,

    /*
    |--------------------------------------------------------------------------
    | Google Analytics ID
    |--------------------------------------------------------------------------
    |
    | If you enter your analytics ID the GA code will be added to the site.
    |
    | Below is currently setup for PHPFog, but a regular string key can be used
    | in most situations.
    */

    'google_analytics' => false,

    /*
    |--------------------------------------------------------------------------
    | Terms of service company
    |--------------------------------------------------------------------------
    |
    | The company running this hosted instance of PasteVault
    |
    | Below is currently setup for PHPFog, but a regular string key can be used
    | in most situations.
    */

    'company' => "Blackglass",
];
