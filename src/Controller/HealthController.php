<?php

declare(strict_types=1);

namespace MainlyCode\HealthBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class HealthController
{
    public function __invoke(): Response
    {
        return new Response('👍', Response::HTTP_OK);
    }
}
