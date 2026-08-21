<?php

declare(strict_types=1);

namespace MainlyCode\HealthBundle\Controller;

use MainlyCode\HealthBundle\HealthBundle;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

#[CoversClass(HealthBundle::class)]
#[CoversClass(HealthController::class)]
#[Group('functional')]
final class HealthControllerFunctionalTest extends WebTestCase
{
    #[Test]
    public function it_returns_a_200_ok(): void
    {
        $client = static::createClient();

        $client->request('GET', '/health');

        $response = $client->getResponse();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('👍', $response->getContent());
    }

    #[Test]
    public function it_registers_the_route_under_the_bundle_path(): void
    {
        self::bootKernel();

        $router = static::getContainer()->get('router');
        self::assertInstanceOf(RouterInterface::class, $router);

        $route = $router->getRouteCollection()->get('health');

        self::assertNotNull($route);
        self::assertSame('/health', $route->getPath());
    }
}
