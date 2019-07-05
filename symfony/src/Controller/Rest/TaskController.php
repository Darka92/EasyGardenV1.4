<?php
namespace App\Controller\Rest;


use App\Entity\Jardin;
use App\Entity\User;
use App\Entity\Task;
use App\Repository\TaskRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class TaskController extends AbstractFOSRestController
{

    /**
     * @var LoggerInterface
     */
    private $logger;
    private $context;

    /**
     * @var TaskRepository
     */
    private $taskRepository;

    private $userRepository;

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

        $this->taskRepository = $this->em->getRepository(Task::class);
        $this->userRepository = $this->em->getRepository(User::class);
    }


    /**
     * Retrieves a user resource
     * @Rest\Get("/userinfos/{userId}")
     *
     */
    public function getUserInfos(int $userId): View
{
    $entityManager = $this->getDoctrine()->getManager();
    /** @var User $user */
    $user = $entityManager->getRepository(User::class)->findOneById($userId);

        if($user) {
            $this->logger->debug("User with id :" . $user->getId() );
            // In case our GET was a success we need to return a 200 HTTP OK response with the request object

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            $jsonObject = $serializer->serialize($user, 'json', [
                'circular_reference_handler' => function ($object) {
                    if($object instanceof Jardin){
                        return $object->getJardinId();
                    }elseif($object instanceof User){
                        return $object->getJardins();
                    }

                }
            ]);

            return View::create($jsonObject, Response::HTTP_OK);

        }else{
            $this->logger->debug("User with id " . $userId . " NOT FOUND !" );
            return View::create(null, Response::HTTP_NO_CONTENT);
        }

}


    /**
     * Retrieves all users
     * @Rest\Get("/allusers")
     */
    public function getAllUsers(): View
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var User $users */
        $users = $entityManager->getRepository(User::class)->findAll();

        if($users) {
            $this->logger->debug("there are " . count($users) . "Users." );
            // In case our GET was a success we need to return a 200 HTTP OK response with the request object

            $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);

            $jsonObject = $serializer->serialize($users, 'json', [
                'circular_reference_handler' => function ($object) {
                    if($object instanceof Jardin){
                        return $object->getJardinId();
                    }elseif($object instanceof User){
                        return $object->getJardins();
                    }

                }
            ]);

            return View::create($jsonObject, Response::HTTP_OK, ['Content-Type' => 'application/json']);

        }else{
            $this->logger->debug("no user found");
            return View::create(null, Response::HTTP_NO_CONTENT);
        }

    }


    /**
     * Retrieves a task resource
     * @Rest\Get("/task/{id}")
     *
     */
    public function getTask(int $id): View
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Task $task */
        $task = $entityManager->getRepository(Task::class)->findOneById($id);

        if($task) {
            $this->logger->debug("Task with id :" . $task->getId() );
            return View::create($task, Response::HTTP_OK);

        }else{
            $this->logger->debug("Task with id " . $id . " NOT FOUND !" );
            return View::create(null, Response::HTTP_NO_CONTENT);
        }

    }


    /**
     * Retrieves all tasks
     * @Rest\Get("/alltasks")
     */
    public function getAllTask(): View
    {
        $entityManager = $this->getDoctrine()->getManager();
        /** @var Task $allTasks */
        $tasks = $entityManager->getRepository(Task::class)->findAll();

        if($tasks) {
            $this->logger->debug("there are " . count($tasks) . "Users." );
            return View::create($tasks, Response::HTTP_OK);

        }else{
            $this->logger->debug("no user found");
            return View::create(null, Response::HTTP_NO_CONTENT);
        }

    }


    /**
     * Create a task resource
     * @Rest\Post("/createtask")
     * @param Request $request
     * @return View
     */
    public function createTask(Request $request): View
    {
        $task = new Task();
        $task->setContent($request->get('content'));
        $task->setTitre($request->get('titre'));
        $task->setDate(new \DateTime($request->get('date')));

        $this->em->persist($task);
        $this->em->flush();

        //$this->taskRepository->save($task);

        // In case our POST was a success we need to return a 201 HTTP CREATED response
        return View::create($task, Response::HTTP_CREATED);
    }
}
