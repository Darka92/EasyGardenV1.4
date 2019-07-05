<?php
namespace App\Controller\Entities;

use App\Entity\Eclairage;
use App\Repository\EclairageRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class EclairageController extends AbstractController
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

        $this->eclairageRepository = $this->em->getRepository(Eclairage::class);
    }


    /**
     * Retrieves all eclairages
     * @Route("/alleclairages", methods={"GET", "POST"})
     *
     *
     */
    public function getAllEclairage()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Eclairage $eclairages */
        $eclairages = $entityManager->getRepository(Eclairage::class)->findAll();

        if($eclairages) {
            $this->logger->debug("Il y a " . count($eclairages) . "réseaux d'eclairages." );

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($eclairages, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de système d'eclairage trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de système d\'eclairage trouvé');
        }

    }
}
