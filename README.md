# mainlycode/health-bundle

[![CI](https://github.com/mainlycode/health-bundle/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/mainlycode/health-bundle/actions/workflows/ci.yml)

Symfony bundle for adding a /health endpoint to your application

## Requirements

This bundle supports the PHP and Symfony versions that are officially supported
by their maintainers:

- [PHP](https://www.php.net/supported-versions.php) 8.2, 8.3, 8.4 and 8.5
- [Symfony](https://symfony.com/releases) 6.4 LTS, 7.4 LTS and 8.1

## Installation

Install the bundle with [Composer](https://getcomposer.org/):

```
composer require mainlycode/health-bundle
```

Register the bundle in your application (`config/bundles.php`):

```php
return [
    /** your other bundles */
    MainlyCode\HealthBundle\HealthBundle::class => ['all' => true],
];
```

To add the route to your application, add the following to your `config/routing.yaml`:

```yaml
health:
    resource: '@HealthBundle/config/routing.yaml'
```

or if you are importing routes in PHP:

```php
// config/routes.php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->import('@HealthBundle/config/routing.yaml');
};
```

## Contributing

```
make dependencies   # install the Composer dependencies
make test           # run the test suite
make coverage       # report the test coverage
make phpstan        # run static analysis
make qa             # run all quality assurance checks
```
