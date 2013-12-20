# FractalServiceProvider
<!--
[![Build Status](https://travis-ci.org/marcaddeo/fractal-service-provider.png?branch=master)](https://travis-ci.org/marcaddeo/fractal-service-provider)
[![Total Downloads](https://poser.pugx.org/marcaddeo/fractal-service-provider/downloads.png)](https://packagist.org/packages/marcaddeo/fractal-service-provider)
[![Latest Stable Version](https://poser.pugx.org/marcaddeo/fractal-service-provider/v/stable.png)](https://packagist.org/packages/marcaddeo/fractal-service-provider)
-->

[Fractal](https://github.com/php-leop/fractal) Service Provider for Silex

## Install

Via Composer

``` json
{
    "require": {
        "madd/fractal-service-provider": "~1.0"
    }
}
```


## Usage

``` php
use League\Fractal\Collection;

/**
 * You can set the scope identifier that Fractal uses to get it's embed's here.
 * If not set here, it will default to 'embed'
 */
$app->register(new Madd\Silex\Provider\Fractal\FractalServiceProvider, array(
    'fractal.scope_identifier' => 'embed'
));

$resource = new Collection($model, new ModelTransformer);
$data     = $app['fractal']->createData($resource);

print_r($data->toArray());
```


## Testing

``` bash
$ phpunit
```


## Contributing

Please see [CONTRIBUTING](https://github.com/marcaddeo/fractal-service-provider/blob/master/CONTRIBUTING.md) for details.


## Credits

- [Marc Addeo](https://github.com/marcaddeo)
- [All Contributors](https://github.com/marcaddeo/fractal-service-provider/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/marcaddeo/fractal-service-provider/blob/master/LICENSE) for more information.
