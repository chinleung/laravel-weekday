# Laravel Weekday

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chinleung/laravel-weekday.svg?style=flat-square)](https://packagist.org/packages/chinleung/laravel-weekday)
[![Build Status](https://img.shields.io/travis/chinleung/laravel-weekday/master.svg?style=flat-square)](https://travis-ci.org/chinleung/laravel-weekday)
[![Quality Score](https://img.shields.io/scrutinizer/g/chinleung/laravel-weekday.svg?style=flat-square)](https://scrutinizer-ci.com/g/chinleung/laravel-weekday)
[![Total Downloads](https://img.shields.io/packagist/dt/chinleung/laravel-weekday.svg?style=flat-square)](https://packagist.org/packages/chinleung/laravel-weekday)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require chinleung/laravel-weekday
```

## Usage

### Retrieve a name from a value

``` php
LaravelWeekday::name(0); // Sunday
```

### Retrieving a name from a value for a different locale

``` php
LaravelWeekday::name(1, 'fr'); // Lundi
```

### Retrieving a value from a name

``` php
LaravelWeekday::value('Sunday'); // 0
```

### Retrieving a value from a name for a different locale

``` php
LaravelWeekday::value('Dimanche', 'fr'); // 0
```

### Retrieving all names for a locale

``` php
LaravelWeekday::names('en');
```

### Changing the locale of an instance

``` php
LaravelWeekday::name(0)->to('fr')->getName(); // Dimanche
```

### Retrieving the PhpWeek instance:

``` php
// Object of \ChinLeung\PhpWeek\PhpWeek with Sunday and set to locale of the application.
LaravelWeekday::parse('Sunday')->getInstance();
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@chinleung.com instead of using the issue tracker.

## Credits

- [Chin Leung](https://github.com/chinleung)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
