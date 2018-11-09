<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Rest\RouteResource(
 *     "Album",
 *     pluralize=false
 * )
 */
class AlbumController extends FOSRESTController implements ClassResourceInterface
{

    public function postAction(Request $request)
    {

    }


}
