# This is my package hackathon

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require avocado-media/hackathon
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="hackathon-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="hackathon-views"
```

## Usage

```php
$hackathon = new Avocadomedia\Hackathon();
echo $hackathon->echoPhrase('Hello, Avocadomedia!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sjors](https://github.com/orgs/avocado-media/people/devsjors)
- [Lars](https://github.com/orgs/avocado-media/people/larstw98)
- [Sem](https://github.com/orgs/avocado-media/people/semammerlaan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
