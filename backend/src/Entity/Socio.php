
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocioRepository")
 */
class Socio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="socios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    // getters and setters...
}
