<?php
namespace App\Controller\Entities;

/* Modèle */
use App\Entity\User;

/* Repository */
use App\Repository\UserRepository;

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


class UserController extends AbstractController
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

        $this->userRepository = $this->em->getRepository(User::class);
    }



                /*------*/
                /* READ */
                /*------*/


    /**
     * Retrieves one user
     */
    public function getOneUser(int $id)
    {
        /** @var User $user */
        $user = $this->userRepository->findOneById($id);

        if($user) {
            $this->logger->debug("User with id :" . $user->getId() );

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($user, 'json', [
                'attributes' => ['id','username'],

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
            $this->logger->debug("Pas d'utilisateur trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas d\'utilisateur trouvé !');
        }

    }


    /**
     * Retrieves all users
     */
    public function getAllUsers()
    {
        /** @var User $users */
        $users = $this->userRepository->findAll();

        if($users) {
            $this->logger->debug("Il y a " . count($users) . "utilisateurs." );

            $encoders = [new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            // Serialize your object in Json
            $jsonObject = $serializer->serialize($users, 'json', [
                'ignored_attributes' => ['email','emailCanonical','usernameCanonical','password','passwordRequestedAt',
                    'plainPassword','salt','lastLogin','confirmationToken','roles','superAdmin','groups','credentialsNonExpired',
                    'accountNonLocked','accountNonExpired','groupNames','createTime','enabled','__initializer__','__cloner__','__isInitialized__'],

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
            $this->logger->debug("Pas d'utilisateur trouvé !");
            //return View::create(null, Response::HTTP_NO_CONTENT);
            return new Response('Pas d\'utilisateur trouvé !');
        }

    }



                /*----------------------*/
                /* CREATE/UPDATE/DELETE */
                /*----------------------*/

    /**
     * Add one user
     */
    public function getAddUser(Request $request)
    {
        /** @var User $user */

        $user = new User();

        $user->setUsername($request->get('username'))
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'));
        
        $this->em->persist($user);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(201);
        return $response;
    }


    /**
     * Update one user
     */
    public function getUpdateUser(Request $request, int $id)
    {
        /** @var User $user */
        $user = $this->userRepository->findOneByUserId($id);

        $user->setUsername($request->get('username'))
            ->setEmail($request->get('email'))
            ->setPassword($request->get('password'));

        $this->em->persist($user);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(200);
        return $response;  
    }


    /**
     * Delete one user
     */
    public function getDeleteUser(int $id)
    {
        /** @var User $user */
        $user = $this->userRepository->findOneByUserId($id);
        $this->em->remove($user);
        $this->em->flush();
        $response = new Response(); 
        $response->setStatusCode(204);
        return $response;        
    }


}
