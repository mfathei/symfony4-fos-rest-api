<?php

namespace App\Controller;

use App\Entity\Album;
use App\Form\AlbumType;
use App\Repository\AlbumRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Rest\RouteResource(
 *     "Album",
 *     pluralize=false
 * )
 */
class AlbumController extends FOSRESTController implements ClassResourceInterface
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var AlbumRepository
     */
    private $albumRepository;

    public function __construct(EntityManagerInterface $entityManager,
                                AlbumRepository $albumRepository)
    {
        $this->entityManager = $entityManager;
        $this->albumRepository = $albumRepository;
    }

    public function postAction(Request $request)
    {
        $form = $this->createForm(AlbumType::class, new Album());

        $form->submit($request->request->all());

        if (false === $form->isValid()) {
            $this->view($form);
        }

        $this->entityManager->persist($form->getData());
        $this->entityManager->flush();

        return $this->view(['status' => 'ok'], JsonResponse::HTTP_CREATED);

    }

    public function getAction(string $id)
    {
        return $this->view(
            $this->findAlbumById($id)
        );
    }

    public function cgetAction()
    {
        return $this->view(
            $this->albumRepository->findAll()
        );
    }

    public function putAction(Request $request, string $id)
    {
        $existingAlbum = $this->findAlbumById($id);

        $form = $this->createForm(AlbumType::class, $existingAlbum);

        $form->submit($request->request->all());

        if (false === $form->isValid()) {
            return $this->view($form);
        }

        $this->entityManager->flush();

        return $this->view(null, JsonResponse::HTTP_NO_CONTENT);
    }

    /**
     * @param $id
     * @return Album|null
     */
    private function findAlbumById($id): ?Album
    {
        $album = $this->albumRepository->find($id);

        if (null === $album) {
            throw new NotFoundHttpException();
        }

        return $album;
    }
}
