# Pimp my route:list

Simple package to view, search, and filter `route:list` in the browser, created at
the [Dutch Laravel Foundation](https://dutchlaravelfoundation.nl/) meet-up. This package
is inspired by https://github.com/garygreen/pretty-routes.

## Installation

You can install the package via composer:

```bash
composer require avocado-media/route-viewer
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="route-viewer-config"
```

This is the contents of the published config file:

```php
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
    | https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Regular_Expressions/Cheatsheet
    |
    */

    'ignored_routes' => [
        '#^route-viewer#',
        '#^_debugbar#',
        '#^_ignition#',
        '#^routes$#'
    ],

];
```

## Usage

After installation, you can view the route list at `/route-viewer`.

## Roadmap

- [ ] Filtering and searching back-end
- [ ] Add middleware to the `/route-viewer` route
- [ ] More config variables
- [ ] Move logic to separate classes as the package grows

## Credits

- [Sjors](https://github.com/orgs/avocado-media/people/devsjors)
- [Lars](https://github.com/orgs/avocado-media/people/larstw98)
- [Sem](https://github.com/orgs/avocado-media/people/semammerlaan)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
