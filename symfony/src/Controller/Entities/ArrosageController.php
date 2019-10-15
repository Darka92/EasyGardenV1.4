<?php
namespace App\Controller\Entities;

/* Modèle */
use App\Entity\Arrosage;

/* Repository */
use App\Repository\ArrosageRepository;

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


    
                /*------*/
                /* READ */
                /*------*/

    /**
     * Retrieves one arrosage
     */
    public function getOneArrosage(int $id)
    {
        /** @var Arrosage $arrosage */
        $arrosage = $this->arrosageRepository->findOneByArrosageId($id);

        if($arrosage) {

            $encoders = [new JsonEncoder()]; 
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



                /*----------------------*/
                /* CREATE/UPDATE/DELETE */
                /*----------------------*/

    /**
     * Add one arrosage
     */
    public function getAddArrosage(Request $request)
    {
        /** @var Arrosage $arrosage */

        $arrosage = new Arrosage();

        $arrosage->setNom($request->get('nom'))
                ->setLocalisation($request->get('localisation'))
                ->setCapteurDebit($request->get('capteurDebit'))
                ->setCapteurPression($request->get('capteurPression'))
                ->setStatut($request->get('statut'));
        
        $this->em->persist($arrosage);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(201);
        return $response;
    }


    /**
     * Update one arrosage
     */
    public function getUpdateArrosage(Request $request, int $id)
    {
        /** @var Arrosage $arrosage */
        $arrosage = $this->arrosageRepository->findOneByArrosageId($id);
        $arrosage->setNom($request->get('nom'))
                ->setLocalisation($request->get('localisation'))
                ->setCapteurDebit($request->get('capteurDebit'))
                ->setCapteurPression($request->get('capteurPression'))
                ->setStatut($request->get('statut'));
        $this->em->persist($arrosage);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;  
    }


    /**
     * Delete one arrosage
     */
    public function getDeleteArrosage(int $id)
    {
        /** @var Arrosage $arrosage */
        $arrosage = $this->arrosageRepository->findOneByArrosageId($id);
        $this->em->remove($arrosage);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(204);
        return $response; 
        /*return new Response(HTTP_NO_CONTENT);*/    
    }

}