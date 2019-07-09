<?php
namespace App\Controller\Entities;

use App\Entity\Arrosage;
use App\Entity\Portail;
use App\Repository\PortailRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class PortailController extends AbstractController
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

        $this->portailRepository = $this->em->getRepository(Portail::class);
    }


    /**
     * Retrieves one portail
     * @Route("/oneportail/{id}", methods={"GET", "POST"})
     */
    public function getOnePortail(int $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Portail $portail */
        $portail = $entityManager->getRepository(Portail::class)->findOneByPortailId($id);

        if($portail) {

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($portail, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de portail trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de portail trouvé');
        }

    }

    /**
     * Retrieves all portails
     * @Route("/allportails", methods={"GET", "POST"})
     *
     *
     */
    public function getAllPortail()
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Portail $portails */
        $portails = $entityManager->getRepository(Portail::class)->findAll();

        if($portails) {
            $this->logger->debug("Il y a " . count($portails) . "portail(s)." );

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($portails, 'json', [
                'circular_reference_handler' => function ($object) {
                    return $object->getJardinId();
                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de portail trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de portail trouvé');
        }

    }

}
