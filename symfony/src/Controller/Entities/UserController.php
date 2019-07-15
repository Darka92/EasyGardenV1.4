<?php
namespace App\Controller\Entities;

use App\Entity\User;
use App\Entity\Jardin;
use App\Repository\UserRepository;
use App\Repository\JardinRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


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
}
