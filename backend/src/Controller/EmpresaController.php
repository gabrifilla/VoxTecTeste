
namespace App\Controller;

use App\Entity\Empresa;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/empresas")
 */
class EmpresaController extends AbstractController
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
        $empresas = $this->entityManager->getRepository(Empresa::class)->findAll();
        return $this->json($empresas);
    }

    /**
     * @Route("/{id}", methods={"GET"})
     */
    public function show($id): Response
    {
        $empresa = $this->entityManager->getRepository(Empresa::class)->find($id);
        return $this->json($empresa);
    }

    /**
     * @Route("", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $empresa = new Empresa();
        $empresa->setNome($data['nome']);

        $this->entityManager->persist($empresa);
        $this->entityManager->flush();

        return $this->json($empresa);
    }

    /**
     * @Route("/{id}", methods={"PUT"})
     */
    public function update(Request $request, $id): Response
    {
        $data = json_decode($request->getContent(), true);
        $empresa = $this->entityManager->getRepository(Empresa::class)->find($id);

        if (!$empresa) {
            return $this->json(['message' => 'Empresa não encontrada'], 404);
        }

        $empresa->setNome($data['nome']);
        $this->entityManager->flush();

        return $this->json($empresa);
    }

    /**
     * @Route("/{id}", methods={"DELETE"})
     */
    public function delete($id): Response
    {
        $empresa = $this->entityManager->getRepository(Empresa::class)->find($id);

        if (!$empresa) {
            return $this->json(['message' => 'Empresa não encontrada'], 404);
        }

        $this->entityManager->remove($empresa);
        $this->entityManager->flush();

        return $this->json(['message' => 'Empresa deletada com sucesso']);
    }
}
