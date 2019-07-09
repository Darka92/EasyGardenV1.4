<?php
namespace App\Controller\Entities;

use App\Entity\Arrosage;
use App\Entity\Tondeuse;
use App\Repository\TondeuseRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class TondeuseController extends AbstractController
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

        $this->tondeuseRepository = $this->em->getRepository(Tondeuse::class);
    }


    /**
     * Retrieves one tondeuse
     * @Route("/onetondeuse/{id}", methods={"GET", "POST"})
     */
    public function getOneTondeuse(int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Tondeuse $tondeuse */
        $tondeuse = $entityManager->getRepository(Tondeuse::class)->findOneByTondeuseId($id);

        if($tondeuse) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($tondeuse, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de tondeuse trouvée !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de tondeuse trouvée');
        }

    }

    /**
     * Retrieves all tondeuses
     * @Route("/alltondeuses", methods={"GET", "POST"})
     *
     *
     */
    public function getAllTondeuse()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Tondeuse $tondeuses */
        $tondeuses = $entityManager->getRepository(Tondeuse::class)->findAll();

        if($tondeuses) {
            $this->logger->debug("Il y a " . count($tondeuses) . "tondeuse(s)." );

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($tondeuses, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de tondeuse trouvée !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de tondeuse trouvée');
        }

    }

}
