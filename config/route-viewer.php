<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Slash Prefix
    |--------------------------------------------------------------------------
    |
    | Here you may specify if every route displayed in the route viewer should be
    | prefixed with a slash character (/) or not.
    |
    */

    'slash_prefix' => false,

    /*
    |--------------------------------------------------------------------------
    | Ignored Routes
    |--------------------------------------------------------------------------
    |
    | Here you may specify what routes should be ignored from the route list by
    | using regular expressions.
    |
    | Read more at: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions/Cheatsheet
    |
    */

    'ignored_routes' => [
        '/route-viewer',
        '#^_debugbar#',
        '#^_ignition#',
        '#^routes$#'
    ],

];
