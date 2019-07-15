<?php
namespace App\Controller\Entities;

use App\Entity\Arrosage;
use App\Repository\ArrosageRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class ArrosageController extends AbstractController
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

        $this->arrosageRepository = $this->em->getRepository(Arrosage::class);
    }


    /**
     * Retrieves one arrosage
     */
    public function getOneArrosage(int $id)
    {
        /** @var Arrosage $arrosage */
        $arrosage = $this->arrosageRepository->findOneByArrosageId($id);

        if($arrosage) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($arrosage, 'json', [
                'attributes' => ['arrosageId','nom','localisation','capteurDebit','capteurPression','statut'],

                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de système d'arrosage trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de système d\'arrosage trouvé');
        }

    }



    /**
     * Retrieves all arrosages
     */
    public function getAllArrosages()
    {

        /** @var Arrosage $arrosages */
        $arrosages = $this->arrosageRepository->findAll();

        if($arrosages) {
            $this->logger->debug("Il y a " . count($arrosages) . "réseaux d'arrosages." );

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($arrosages, 'json', [
                'attributes' => ['arrosageId','nom','localisation','capteurDebit','capteurPression','statut'],

                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de système d'arrosage trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de système d\'arrosage trouvé !');
        }

    }

}
