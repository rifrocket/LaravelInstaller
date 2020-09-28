# Laravel web Installation wizard Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rifrocket/laravelinstaller.svg?style=flat-square)](https://packagist.org/packages/rifrocket/laravelinstaller)
[![Build Status](https://img.shields.io/travis/rifrocket/laravelinstaller/master.svg?style=flat-square)](https://travis-ci.org/rifrocket/laravelinstaller)
[![Quality Score](https://img.shields.io/scrutinizer/g/rifrocket/laravelinstaller.svg?style=flat-square)](https://scrutinizer-ci.com/g/rifrocket/laravelinstaller)
[![Total Downloads](https://img.shields.io/packagist/dt/rifrocket/laravelinstaller.svg?style=flat-square)](https://packagist.org/packages/rifrocket/laravelinstaller)

-THIS PACKAGE IS STILL UNDER TESTING AND DEVELOPMENT-

This package is build on top of the [rachidlaasri/laravel-installer](https://github.com/rashidlaasri/LaravelInstaller) package, This package just overcome some the big problems that I faced during my project development such as adding new environment elements in installation wizard form and validation of new variables. 

##key Feature:

1-It will use you predefined environment keys from .env.example.

2-Easy to expand set of environment keys and validations.

3-Multi-lingual support.

## Installation

You can install the package via composer:

```bash
composer require rifrocket/laravelinstaller
```
Register the package
    Laravel 5.5 and up Uses package auto discovery feature, no need to edit the config/app.php file.

Laravel 5.4 and below Register the package with laravel in config/app.php under providers with the following:
```bash
'providers' => [
	    rifrocket\LaravelInstaller\LaravelInstallerServiceProvider::class,
	];
```

Publish the packages views, config file, assets, and language files by running the following from your projects root folder:
```bash
php artisan vendor:publish --tag=laravelinstaller
```

## Usage

Install Routes Notes

In order to install your application, go to the /install route and follow the instructions.
Once the installation has run the empty file installed will be placed into the /storage directory. If this file is present the route /install will abort to the 404 page.
Update Route Notes

In order to update your application, go to the /update route and follow the instructions.
The /update routes count how many migration files exist in the /database/migrations folder and compares that count against the migrations table. If the files count is greater then the /update route will render, otherwise, the page will abort to the 404 page.
Additional Files and folders published to your project :



### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mohammad.arif9999@gmail.com instead of using the issue tracker.

## Credits

- [Mohammad Arif](https://github.com/rifrocket)
- [Rachid Laasri](https://github.com/rashidlaasri)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
