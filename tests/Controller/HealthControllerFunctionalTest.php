<?php

declare(strict_types=1);

namespace MainlyCode\HealthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/** @group functional */
class HealthControllerFunctionalTest extends WebTestCase
{
    /** @test */
    public function it_returns_a_200_ok()
    {
        /** @var KernelBrowser $client */
        $client = static::createClient();

        $client->request('GET','/health');

        /** @var Response */
        $response = $client->getResponse();

        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals('👍', $response->getContent());
    }
}
