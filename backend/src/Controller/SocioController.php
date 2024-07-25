<?php

namespace App\Controller;

use App\Entity\Socio;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/socios")
 */
class SocioController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("", methods={"GET"})
     */
    public function index(): Response
    {
        $socios = $this->entityManager->getRepository(Socio::class)->findAll();
        return $this->json($socios);
    }

    /**
     * @Route("/{id}", methods={"GET"})
     */
    public function show($id): Response
    {
        $socio = $this->entityManager->getRepository(Socio::class)->find($id);
        return $this->json($socio);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $socio = new Socio();
        $socio->setNome($data['nome']);
        $socio->setCPF($data['cpf']);
        $socio->setEmpresa($data['empresa']);

        $this->entityManager->persist($socio);
        $this->entityManager->flush();

        return $this->json($socio);
    }

    /**
     * @Route("/{id}", methods={"PUT"})
     */
    public function update(Request $request, $id): Response
    {
        $data = json_decode($request->getContent(), true);
        $socio = $this->entityManager->getRepository(Socio::class)->find($id);

        if (!$socio) {
            return $this->json(['message' => 'Socio não encontrada'], 404);
        }

        $socio->setNome($data['nome']);
        $socio->setCPF($data['cpf']);
        $socio->setEmpresa($data['empresa']);
        
        $this->entityManager->flush();

        return $this->json($socio);
    }

    /**
     * @Route("/{id}", methods={"DELETE"})
     */
    public function delete($id): Response
    {
        $socio = $this->entityManager->getRepository(Socio::class)->find($id);

        if (!$socio) {
            return $this->json(['message' => 'Socio não encontrada'], 404);
        }

        $this->entityManager->remove($socio);
        $this->entityManager->flush();

        return $this->json(['message' => 'Socio deletada com sucesso']);
    }
}

