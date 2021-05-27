# mainlycode/health-bundle

Symfony bundle for adding a /health endpoint to your application

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
