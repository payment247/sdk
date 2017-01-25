# sdk

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
[![StyleCI](https://styleci.io/repos/80045195/shield?branch=master)](https://styleci.io/repos/80045195)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Install

Via Composer

``` bash
$ composer require payment247/sdk
```

## Usage

#### Make external calls

Create new client
```php
$client = new ApiClient('public_key', 'private_key');
```

Then send request
```php
$request = new PaymentSystemsRequest();
$client->send($request);
```

*Check `Requests` and `Responses` directories to see all available types of requests and responses*

#### Parse notifications
You should just pass json notification to parse method

```php
$client = NotificationClient('private_key');
$client->parse('json_notification');
```

*Explore `Notifications` directory to see all available types of notifications*


## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email support@247pay.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/payment247/sdk.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/payment247/sdk/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/payment247/sdk.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/payment247/sdk.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/payment247/sdk.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/payment247/sdk
[link-travis]: https://travis-ci.org/payment247/sdk
[link-scrutinizer]: https://scrutinizer-ci.com/g/payment247/sdk/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/payment247/sdk
[link-downloads]: https://packagist.org/packages/payment247/sdk
[link-author]: https://github.com/
[link-contributors]: ../../contributors
