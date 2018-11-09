<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations;

class HealthcheckController extends FOSRestController
{
    /**
     * @Annotations\Get(
     *     path="/ping"
     * )
     */
    public function getAction()
    {
        return new JsonResponse('pong');
    }
}
