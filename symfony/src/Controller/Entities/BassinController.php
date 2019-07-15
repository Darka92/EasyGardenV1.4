<?php
namespace App\Controller\Entities;

use App\Entity\Bassin;
use App\Entity\Jardin;
use App\Repository\BassinRepository;

use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class BassinController extends AbstractController
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    private $context;
    private $em;


    /**
     * constructor
     */
    public function __construct(EntityManagerInterface $entityManager, LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->context = __CLASS__ . " ";

        $this->logger->debug("" . $this->context);

        $this->em = $entityManager;

        $this->bassinRepository = $this->em->getRepository(Bassin::class);
    }


    /**
     * Retrieves one bassin
     */
    public function getOneBassin(int $id)
    {
        /** @var Bassin $bassin */
        $bassin = $this->bassinRepository->findOneByBassinId($id);

        if($bassin) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($bassin, 'json', [
                'attributes' => ['bassinId','nom'],

                'circular_reference_handler' => function ($object) {
                    if ($object instanceof Jardin) {
                        return $object->getJardinId();
                    } elseif ($object instanceof Equipement) {
                        return $object->getEquipementId();
                    }

                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de bassin trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de bassin trouvé');
        }

    }

    /**
     * Retrieves all bassins
     */
    public function getAllBassins()
    {
        /** @var Bassin $bassins */
        $bassins = $this->bassinRepository->findAll();

        if($bassins) {

            $encoders = [new JsonEncoder()];                // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($bassins, 'json', [
                'attributes' => ['bassinId','nom'],

                'circular_reference_handler' => function ($object) {
                    if ($object instanceof Jardin) {
                        return $object->getJardinId();
                    } elseif ($object instanceof Equipement) {
                        return $object->getEquipementId();
                    }

                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de bassin trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de bassin trouvé');
        }

    }

}
