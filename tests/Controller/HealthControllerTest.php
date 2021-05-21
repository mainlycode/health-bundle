<?php

declare(strict_types=1);

namespace MainlyCode\HealthBundle\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class HealthControllerTest extends TestCase
{
    /** @test */
    public function it_returns_a_200_ok()
    {
        $controller = new HealthController();

        /** @var Response */
        $response = $controller();

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals('👍', $response->getContent());
    }
}
