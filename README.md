# FractalServiceProvider

[![Build Status](https://travis-ci.org/marcaddeo/fractal-service-provider.png?branch=master)](https://travis-ci.org/marcaddeo/fractal-service-provider)
[![Total Downloads](https://poser.pugx.org/marcaddeo/fractal-service-provider/downloads.png)](https://packagist.org/packages/marcaddeo/fractal-service-provider)
[![Latest Stable Version](https://poser.pugx.org/marcaddeo/fractal-service-provider/v/stable.png)](https://packagist.org/packages/marcaddeo/fractal-service-provider)

Service provider for Silex for using [Fractal](https://github.com/php-leop/fractal).

## Install

Via Composer

``` json
{
    "require": {
        "marcaddeo/fractal-service-provider": "~1.0"
    }
}
```


## Usage

``` php
use League\Fractal\Collection;

$app->register(new Madd\Silex\Provider\Fractal\FractalServiceProvider);

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
