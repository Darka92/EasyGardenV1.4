<?php
namespace App\Controller\Entities;

use App\Entity\Jardin;
use App\Entity\User;
use App\Repository\JardinRepository;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class JardinController extends AbstractController
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

        $this->jardinRepository = $this->em->getRepository(Jardin::class);
    }



    /**
     * Retrieves one jardin
     */
    public function getOneJardin(int $id)
    {
        /** @var Jardin $jardin */
        $jardin = $this->jardinRepository->findOneByJardinId($id);

        if($jardin) {
            $this->logger->debug("Jardin with id :" . $jardin->getJardinId() );

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($jardin, 'json', [
                'attributes' => ['jardinId','nom'],

                'circular_reference_handler' => function ($object) {
                    if($object instanceof Jardin){
                        return $object->getJardinId();
                    }elseif($object instanceof User){
                        return $object->getJardins();
                    }

                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de jardin trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de jardin trouvé !');
        }

    }



    /**
     * Retrieves all jardins
     */
    public function getAllJardins()
    {
        /** @var Jardin $jardins */
        $jardins = $this->jardinRepository->findAll();

        if($jardins) {
            $this->logger->debug("Il y a " . count($jardins) . "jardins." );

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($jardins, 'json', [
                'attributes' => ['jardinId','nom'],

                'circular_reference_handler' => function ($object) {
                    if($object instanceof Jardin){
                        return $object->getJardinId();
                    }elseif($object instanceof User){
                        return $object->getJardins();
                    }

                }
            ]);

            return new Response($jsonObject);

        }else{
            $this->logger->debug("Pas de jardin trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas de jardin trouvé !');
        }

    }

}
