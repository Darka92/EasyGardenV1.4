<?php
namespace App\Controller\Entities;

use App\Entity\Eclairage;
use App\Repository\EclairageRepository;

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
     * Retrieves one eclairage
     */
    public function getOneEclairage(int $id)
    {
        /** @var Eclairage $eclairage */
        $eclairage = $this->eclairageRepository->findOneByEclairageId($id);

        if($eclairage) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($eclairage, 'json', [
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

    /**
     * Retrieves all eclairages
     */
    public function getAllEclairages()
    {
        /** @var Eclairage $eclairages */
        $eclairages = $this->eclairageRepository->findAll();

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
