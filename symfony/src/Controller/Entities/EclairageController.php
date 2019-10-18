<?php
namespace App\Controller\Entities;

/* Modèle */
use App\Entity\Eclairage;

/* Repository */
use App\Repository\EclairageRepository;

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



            /*------*/
            /* READ */
            /*------*/
        
    /**
     * Retrieves one eclairage
     */
    public function getOneEclairage(int $id)
    {
        /** @var Eclairage $eclairage */
        $eclairage = $this->eclairageRepository->findOneByEclairageId($id);

        if($eclairage) {

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($eclairage, 'json', [
                'attributes' => ['eclairageId','nom','localisation','capteurDefautAmpoule','capteurLuminosite','statut'],

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

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($eclairages, 'json', [
                'attributes' => ['eclairageId','nom','localisation','capteurDefautAmpoule','capteurLuminosite','statut'],

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


                /*----------------------*/
                /* CREATE/UPDATE/DELETE */
                /*----------------------*/

    /**
     * Add one eclairage
     */
    public function getAddEclairage(Request $request)
    {
        /** @var Eclairage $eclairage */

        $eclairage = new Eclairage();

        $eclairage->setNom($request->get('nom'))
                ->setLocalisation($request->get('localisation'))
                ->setCapteurDefautAmpoule(false)
                ->setCapteurLuminosite($request->get('capteurLuminosite'))
                ->setStatut($request->get('statut'));
        
        $this->em->persist($eclairage);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(201);
        return $response;
    }


    /**
     * Update one eclairage
     */
    public function getUpdateEclairage(Request $request, int $id)
    {
        /** @var Eclairage $eclairage */
        $eclairage = $this->eclairageRepository->findOneByEclairageId($id);

        $eclairage->setNom($request->get('nom'))
                ->setLocalisation($request->get('localisation'))
                ->setCapteurLuminosite($request->get('capteurLuminosite'));

        $this->em->persist($eclairage);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;  
    }


    /**
     * Delete one eclairage
     */
    public function getDeleteEclairage(int $id)
    {
        /** @var Eclairage $eclairage */
        $eclairage = $this->eclairageRepository->findOneByEclairageId($id);
        $this->em->remove($eclairage);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(204);
        return $response;        
    }


}
