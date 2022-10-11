# Pimp my route:list

Simple package to view, search, filter route:list in the browser

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
        '#^_debugbar#',
        '#^_ignition#',
        '#^routes$#'
    ],

];
```

## Usage

```php
After installation view the routes table at "/route-viewer"  
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Sjors](https://github.com/orgs/avocado-media/people/devsjors)
- [Lars](https://github.com/orgs/avocado-media/people/larstw98)
- [Sem](https://github.com/orgs/avocado-media/people/semammerlaan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
