<?php
namespace App\Controller\Entities;

use App\Entity\Arrosage;
use App\Entity\Bassin;
use App\Entity\Jardin;
use App\Entity\User;
use App\Repository\BassinRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/onebassin/{id}", methods={"GET", "POST"})
     */
    public function getOneBassin(int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Bassin $bassin */
        $bassin = $entityManager->getRepository(Bassin::class)->findOneByBassinId($id);

        if($bassin) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($bassin, 'json', [
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
     * @Route("/allbassins", methods={"GET", "POST"})
     *
     *
     */
    public function getAllBassins()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Bassin $bassins */
        $bassins = $entityManager->getRepository(Bassin::class)->findAll();

        if($bassins) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($bassins, 'json', [
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
