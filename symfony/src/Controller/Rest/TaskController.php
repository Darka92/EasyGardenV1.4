<?php
namespace App\Controller\Rest;


use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\Entity\Task;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
//use App\Services\TaskService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class TaskController extends AbstractFOSRestController
{

    /**
     * @var LoggerInterface
     */
    private $logger;
    private $context;

    /**
     * @var TaskService
     */
    private $taskService;



    /**
     * ArticleController constructor.
     * @param TaskService $articleService
     */
    public function __construct(LoggerInterface $logger)
    {


        $this->logger = $logger;
        $this->context = __CLASS__ . " ";
    }

    /**
     * Creates a task resource
     * @Rest\Post("/tasks")
     * @param Request $request
     * @return View
     */
    /*public function postTask(Request $request): View
    {
        // Todo: 400 response - Invalid Input
        // Todo: 404 response - Resource not found

        //$task = $this->taskService->addTask($request->get('task'), $request->get('duedate'));
        $task = new Task();
        // In case our POST was a success we need to return a 201 HTTP CREATED response
        return View::create($task, Response::HTTP_CREATED);
    }*/

    /**
     * Retrieves a task resource
     * @Rest\Get("/tasks/{taskId}")
     */
    /*public function getTask(int $taskId): View
    {
        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(Task::class)->findById($taskId);

        // In case our GET was a success we need to return a 200 HTTP OK response with the request object
        return View::create($task, Response::HTTP_OK);
    }*/

    /**
     * Retrieves a collection of Article resource
     * @Rest\Get("/tasks")
     */
    /*public function getTasks(): View
    {
        $entityManager = $this->getDoctrine()->getManager();
        $tasks = $entityManager->getRepository(Task::class)->findAll();
        // In case our GET was a success we need to return a 200 HTTP OK response with the collection of article object
        return View::create($tasks, Response::HTTP_OK);
    }*/
}
