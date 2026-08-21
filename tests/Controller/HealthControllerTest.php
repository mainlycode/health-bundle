<?php

declare(strict_types=1);

namespace MainlyCode\HealthBundle\Controller;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

#[CoversClass(HealthController::class)]
final class HealthControllerTest extends TestCase
{
    #[Test]
    public function it_returns_a_200_ok(): void
    {
        $controller = new HealthController();

        $response = $controller();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertSame('👍', $response->getContent());
    }
}
