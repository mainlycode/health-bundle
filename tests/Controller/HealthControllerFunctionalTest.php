<?php

declare(strict_types=1);

namespace MainlyCode\HealthBundle\Controller;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\Group;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

#[Group('functional')]
final class HealthControllerFunctionalTest extends WebTestCase
{
    #[Test]
    public function it_returns_a_200_ok(): void
    {
        /** @var KernelBrowser $client */
        $client = static::createClient();

        $client->request('GET', '/health');

        /** @var Response */
        $response = $client->getResponse();

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals('👍', $response->getContent());
    }
}
