<?php
namespace App\Controller\Entities;

use App\Entity\Equipement;
use App\Entity\Jardin;
use App\Entity\User;
use App\Repository\EquipementRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class EquipementController extends AbstractController
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

        $this->equipementRepository = $this->em->getRepository(Equipement::class);
    }


    /**
     * Retrieves all equipements
     * @Route("/allequipements", methods={"GET", "POST"})
     */
    public function getAllEquipement()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Equipement $equipements */
        $equipements = $entityManager->getRepository(Equipement::class)->findAll();

        if($equipements) {
            $this->logger->debug("Il y a " . count($equipements) . "equipement(s)." );

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($equipements, 'json', [
                'circular_reference_handler' => function ($object) {
                    if($object instanceof Jardin){
                        return $object->getJardinId();
                    }elseif($object instanceof Bassin){
                        return $object->getEquipements();
                    }

                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas d'equipement trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response("Pas d'equipement trouvé !");
        }

    }

    /**
     * Retrieves one equipement
     * @Route("/oneequipement/{id}", methods={"GET", "POST"})
     */
    public function getOneEquipement(int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Equipement $equipement */
        $equipement = $entityManager->getRepository(Equipement::class)->findOneByEquipementId($id);

        if($equipement) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($equipement, 'json', [
                'circular_reference_handler' => function ($object) {
                    if($object instanceof Jardin){
                        return $object->getJardinId();
                    }

                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas d'equipement trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response("Pas d'equipement trouvé !");
        }

    }

}
