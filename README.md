# FractalServiceProvider
[![Build Status](https://travis-ci.org/marcaddeo/fractal-service-provider.png?branch=master)](https://travis-ci.org/marcaddeo/fractal-service-provider)
[![Coverage Status](https://coveralls.io/repos/marcaddeo/fractal-service-provider/badge.png)](https://coveralls.io/r/marcaddeo/fractal-service-provider)
[![Latest Stable Version](https://poser.pugx.org/madd/fractal-service-provider/v/stable.png)](https://packagist.org/packages/madd/fractal-service-provider)
[![Total Downloads](https://poser.pugx.org/madd/silex-fractal-service-provider/downloads.png)](https://packagist.org/packages/madd/silex-fractal-service-provider)

[Fractal](https://github.com/php-loep/fractal) Service Provider for Silex

## Install

Via Composer

``` json
{
    "require": {
        "madd/silex-fractal-service-provider": "dev-master"
    }
}
```


## Usage

``` php
use League\Fractal\Collection;

/**
 * You can set the scope identifier that Fractal uses to get its embeds here.
 * If not set here, it will default to 'embed'
 */
$app->register(new Madd\Silex\Provider\Fractal\FractalServiceProvider, array(
    'fractal.scope_identifier' => 'embed'
));

$resource = new Collection($model, new ModelTransformer);
$data     = $app['fractal']->createData($resource);

print_r($data->toArray());
```


## TODO

Note: The build is only passing because I have a test that only tests if true is true.. 
I still have to implement tests.

- [ ] Unit test to fuck


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
