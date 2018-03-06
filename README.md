# Laravel 5.6 Superauth

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

- Laravel 5.6 Authentication package with
- Multi user type with roles (superadmin, admin, editor, user and featured user)
- User redirect to proper page (profile / admin dashboard)
- Registered user email confirmation using trait (Traits\AuthRedirect)
- User roles sync (include test views url /admin/test, /test/profile  )
- Using Laravel Queue Jobs 
- Customizable Markdown template for notifications (Confirm Email and Reset password)
- User soft delete (active/inactive)
- Auth roles editing method for testing at profile and dashboard 
- All content, message and alerts are localized, languages files in two languages (English, Russian), to insert language switcher please visit my localization easy package [adamibrahim/localization](https://github.com/adamibrahim/localization)


## Demo

- Demo account  
- Username : admin@example.com
- Password : 123456

You can see working [demo](http://admin.hostato.com)



## Login / Profile / Dashboard Routes 
``` bash
- /login (user --not moderator-- login )
- /test/profile (user --not moderator-- profile )
- /admin/login (Moderator login)
- /admin/test (Moderator dashboard)
``` 
## Install

``` bash
$ composer require adamibrahim/superauth
```

###### If you are installing at laravel 5.5 or higher then you may go directly to Publish other wise you will need to edit composer.json, register the Service Provider and the middleware

##### composer.json

Add this code to your composer.json under the autoload at your main directory

``` bash
"psr-4": {
            "Adam\\Superauth\\": "vendor/adamibrahim/superauth/src"
        }
```

##### Service Provider

At file config/app.php register service provider under * Package Service Providers...

``` bash
Adam\Superauth\SuperauthServiceProvider::class,
```
##### Middleware 

if you are using Laravel version lower than 5.5 then you need to register the moderators and Visitor middleware  at your App\Http\Kernel.php
 - At protected $routeMiddleware = [ ] array add the below code 

``` bash
'moderators' => \Adam\Superauth\Middleware\Moderators::class,
'visitor' => \Adam\Superauth\Middleware\Visitor::class,
```

##### Publishing

###### This will overwrite your User.php model 

``` bash
$ php artisan vendor:publish --tag=Superauth --force
```

##### Database Migrating

run the Artisan migration command 

``` bash
$ php artisan migrate
```

### Seeding
Run the Artisan Seeding command

``` bash
$ php artisan db:seed --class=Adam\Superauth\database\seeds\RolesTableSeeder
```

### Artisan Seed Error
If you receive Class not found Error: 
###### ReflectionException : Class Adam\Superauth\database\seeds\RolesTableSeeder does not exist
Then you may need to dump-autoload by running this command 
``` bash
$ composer dump-autoload
```

Then run the seeding command once again

``` bash
$ php artisan db:seed --class=Adam\Superauth\database\seeds\RolesTableSeeder
```

##### Job Queues

I'm Using Queues to send emails (speed up the app) 
however if you don't wish to use it you can change at your .env file

```
QUEUE_DRIVER=sync
```


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [Hostato](http://wwww.hostato.com)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/adamibrahim/superauth
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/adamibrahim/superauth
[link-author]: https://github.com/adamibrahim
[link-contributors]: ../../contributors