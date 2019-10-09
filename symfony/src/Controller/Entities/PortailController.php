<?php
namespace App\Controller\Entities;

use App\Entity\Arrosage;
use App\Entity\Portail;
use App\Repository\PortailRepository;

use FOS\RestBundle\Controller\Annotations as Rest;
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



                /*------*/
                /* READ */
                /*------*/


    /**
     * Retrieves one portail
     */
    public function getOnePortail(int $id)
    {
        /** @var Portail $portail */
        $portail = $this->portailRepository->findOneByPortailId($id);

        if($portail) {

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($portail, 'json', [
                'attributes' => ['portailId','nom','localisation','capteurPresence','statut'],

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
     */
    public function getAllPortails()
    {
        /** @var Portail $portails */
        $portails = $this->portailRepository->findAll();

        if($portails) {
            $this->logger->debug("Il y a " . count($portails) . "portail(s)." );

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($portails, 'json', [
                'attributes' => ['portailId','nom','localisation','capteurPresence','statut'],

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



                /*----------------------*/
                /* CREATE/UPDATE/DELETE */
                /*----------------------*/
   
    /**
     * Add one portail
     */
    public function getAddPortail(Request $request)
    {
        /** @var Portail $portail */

        /*echo $request;*/

        $portail = new Portail();

        $portail->setNom($request->get('nom'))
                ->setLocalisation($request->get('localisation'))
                ->setCapteurPresence($request->get('capteurpresence'))
                ->setStatut($request->get('statut'));
        
        $this->em->persist($portail);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;
    }


    /**
     * Update one portail
     */
    public function getUpdatePortail(Request $request, int $id)
    {
        /** @var Portail $portail */
        $portail = $this->portailRepository->findOneByPortailId($id);

        /*echo $request;*/
        /*echo $id;*/

        $portail->setNom($request->get('nom'))
                ->setLocalisation($request->get('localisation'))
                ->setCapteurPresence($request->get('capteurpresence'))
                ->setStatut($request->get('statut'));

        $this->em->persist($portail);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;  
    } 
                

    /**
     * Delete one portail
     */
    public function getDeletePortail(int $id)
    {
        /** @var Portail $portail */
        $portail = $this->portailRepository->findOneByPortailId($id);
        $this->em->remove($portail);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;        
    }

}
