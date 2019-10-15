<?php
namespace App\Controller\Entities;

/* Modèle */
use App\Entity\Jardin;

/* Repository */
use App\Repository\JardinRepository;

/* Bundles */
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/* Components */
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/* Interfaces */
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;



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



                /*------*/
                /* READ */
                /*------*/


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



                /*----------------------*/
                /* CREATE/UPDATE/DELETE */
                /*----------------------*/

    /**
     * Add one jardin
     */
    public function getAddJardin(Request $request)
    {
        /** @var Jardin $jardin */

        $jardin = new Jardin();

        $jardin->setNom($request->get('nom'));
        
        $this->em->persist($jardin);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(201);
        return $response;
    }


    /**
     * Update one jardin
     */
    public function getUpdateJardin(Request $request, int $id)
    {
        /** @var Arrosage $arrosage */
        $jardin = $this->jardinRepository->findOneByJardinId($id);

        $jardin->setNom($request->get('nom'));

        $this->em->persist($jardin);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;  
    }


    /**
     * Delete one jardin
     */
    public function getDeleteJardin(int $id)
    {
        /** @var Jardin $jardin */
        $jardin = $this->jardinRepository->findOneByJardinId($id);
        $this->em->remove($jardin);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(204);
        return $response;        
    }


}
