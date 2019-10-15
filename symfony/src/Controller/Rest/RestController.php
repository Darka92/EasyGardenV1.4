<?php
namespace App\Controller\Rest;

use App\Entity\Jardin;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Repository\JardinRepository;
use App\Repository\ArrosageRepository;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Psr\Log\LoggerInterface;

use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Controller\Entities\UserController;
use App\Controller\Entities\JardinController;
use App\Controller\Entities\ArrosageController;
use App\Controller\Entities\EclairageController;
use App\Controller\Entities\BassinController;
use App\Controller\Entities\EquipementController;
use App\Controller\Entities\PortailController;
use App\Controller\Entities\TondeuseController;
use Doctrine\ORM\EntityManagerInterface;


/**
 * Class RestController
 * @package App\Controller\Rest
 */
class RestController extends AbstractFOSRestController
{

    private $em;
    private $logger;
    private $context;

    private $uc;
    private $jc;
    private $ac;
    private $ec;
    private $bc;
    private $eqc;
    private $tc;
    private $pc;


    /**
     * constructor
     */
    public function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager) {

        $this->logger = $logger;
        $this->context = __CLASS__ . " ";

        $this->logger->debug("" . $this->context);

        $this->em = $entityManager;

        $this->uc = new UserController($this->em, $this->logger);
        $this->jc = new JardinController($this->em, $this->logger);
        $this->ac = new ArrosageController($this->em, $this->logger);
        $this->ec = new EclairageController($this->em, $this->logger);
        $this->bc = new BassinController($this->em, $this->logger);
        $this->eqc = new EquipementController($this->em, $this->logger);
        $this->tc = new TondeuseController($this->em, $this->logger);
        $this->pc = new PortailController($this->em, $this->logger);
    }



    /* ------USER------ */
    /**
     * Retrieves oneUserController
     * @Route("/oneuser/{id}", methods={"GET"})
     */
    public function oneUserController(int $id) {

        return $this->uc->getOneUser($id);
    }

    /**
     * Retrieves allUsersController
     * @Route("/allusers", methods={"GET"})
     */
    public function allUsersController() {

        return $this->uc->getAllUsers();
    }

    /**
     * Retrieves addUserController
     * @Route("/adduser", methods={"GET", "POST"})
     */
    public function addUserController(Request $request) {

        return $this->uc->getAddUser($request);
    }

    /**
     * Retrieves updateUserController
     * @Route("/updateuser/{id}", methods={"GET", "PUT"})
     */
    public function updateUserController(Request $request, int $id) {

        return $this->uc->getUpdateUser($request, $id);
    }

    /**
     * Retrieves deleteUserController
     * @Route("/deleteuser/{id}", methods={"DELETE"})
     */
    public function deleteUserController(int $id) {

        return $this->uc->getDeleteUser($id);
    }



    /* ------JARDIN------ */
    /**
     * Retrieves oneJardinController
     * @Route("/onejardin/{id}", methods={"GET"})
     */
    public function oneJardinController(int $id) {

        return $this->jc->getOneJardin($id);
    }

    /**
     * Retrieves allJardinsController
     * @Route("/alljardins", methods={"GET"})
     */
    public function allJardinsController() {

        return $this->jc->getAllJardins();
    }

    /**
     * Retrieves addJardinController
     * @Route("/addjardin", methods={"GET", "POST"})
     */
    public function addJardinController(Request $request) {

        return $this->jc->getAddJardin($request);
    }

    /**
     * Retrieves updateJardinController
     * @Route("/updatejardin/{id}", methods={"GET", "PUT"})
     */
    public function updateJardinController(Request $request, int $id) {

        return $this->jc->getUpdateJardin($request, $id);
    }

    /**
     * Retrieves deleteJardinController
     * @Route("/deletejardin/{id}", methods={"DELETE"})
     */
    public function deleteJardinController(int $id) {

        return $this->jc->getDeleteJardin($id);
    }



    /* ------ARROSAGE------ */
    /**
     * Retrieves oneArrosageController
     * @Route("/onearrosage/{id}", methods={"GET"})
     */
    public function oneArrosageController(int $id) {

        return $this->ac->getOneArrosage($id);
    }

    /**
     * Retrieves allArrosagesController
     * @Route("/allarrosages", methods={"GET"})
     */
    public function allArrosagesController() {

        return $this->ac->getAllArrosages();
    }

    /**
     * Retrieves addArrosageController
     * @Route("/addarrosage", methods={"GET", "POST"})
     */
    public function addArrosageController(Request $request) {

        return $this->ac->getAddArrosage($request);
    }

    /**
     * Retrieves updateArrosageController
     * @Route("/updatearrosage/{id}", methods={"GET", "PUT"})
     */
    public function updateArrosageController(Request $request, int $id) {

        return $this->ac->getUpdateArrosage($request, $id);
    }

    /**
     * Retrieves deleteArrosageController
     * @Route("/deletearrosage/{id}", methods={"DELETE"})
     */
    public function deleteArrosageController(int $id) {

        return $this->ac->getDeleteArrosage($id);
    }



    /* ------ECLAIRAGE------ */
    /**
     * Retrieves oneEclairageController
     * @Route("/oneeclairage/{id}", methods={"GET"})
     */
    public function oneEclairageController(int $id) {

        return $this->ec->getOneEclairage($id);
    }

    /**
     * Retrieves allEclairagesController
     * @Route("/alleclairages", methods={"GET"})
     */
    public function allEclairagesController() {

        return $this->ec->getAllEclairages();
    }

    /**
     * Retrieves addEclairageController
     * @Route("/addeclairage", methods={"GET", "POST"})
     */
    public function addEclairageController(Request $request) {

        return $this->ec->getAddEclairage($request);
    }

    /**
     * Retrieves updateEclairageController
     * @Route("/updateeclairage/{id}", methods={"GET", "PUT"})
     */
    public function updateEclairageController(Request $request, int $id) {

        return $this->ec->getUpdateEclairage($request, $id);
    }

    /**
     * Retrieves deleteEclairageController
     * @Route("/deleteeclairage/{id}", methods={"DELETE"})
     */
    public function deleteEclairageController(int $id) {

        return $this->ec->getDeleteEclairage($id);
    }



    /* ------BASSIN------ */
    /**
     * Retrieves oneBassinController
     * @Route("/onebassin/{id}", methods={"GET"})
     */
    public function oneBassinController(int $id) {

        return $this->bc->getOneBassin($id);
    }

    /**
     * Retrieves allBassinsController
     * @Route("/allbassins", methods={"GET"})
     */
    public function allBassinsController() {

        return $this->bc->getAllBassins();
    }

    /**
     * Retrieves addBassinController
     * @Route("/addbassin", methods={"GET", "POST"})
     */
    public function addBassinController(Request $request) {

        return $this->bc->getAddBassin($request);
    }

    /**
     * Retrieves updateBassinController
     * @Route("/updatebassin/{id}", methods={"GET", "PUT"})
     */
    public function updateBassinController(Request $request, int $id) {

        return $this->bc->getUpdateBassin($request, $id);
    }

    /**
     * Retrieves deleteBassinController
     * @Route("/deletebassin/{id}", methods={"DELETE"})
     */
    public function deleteBassinController(int $id) {

        return $this->bc->getDeleteBassin($id);
    }



    /* ------TONDEUSE------ */
    /**
     * Retrieves oneTondeuseController
     * @Route("/onetondeuse/{id}", methods={"GET"})
     */
    public function oneTondeuseController(int $id) {

        return $this->tc->getOneTondeuse($id);
    }

    /**
     * Retrieves allTondeusesController
     * @Route("/alltondeuses", methods={"GET"})
     */
    public function allTondeusesController() {

        return $this->tc->getAllTondeuses();
    }

    /**
     * Retrieves addTondeuseController
     * @Route("/addtondeuse", methods={"GET", "POST"})
     */
    public function addTondeuseController(Request $request) {

        return $this->tc->getAddTondeuse($request);
    }

    /**
     * Retrieves updateTondeuseController
     * @Route("/updatetondeuse/{id}", methods={"GET", "PUT"})
     */
    public function updateTondeuseController(Request $request, int $id) {

        return $this->tc->getUpdateTondeuse($request, $id);
    }

    /**
     * Retrieves deleteTondeuseController
     * @Route("/deletetondeuse/{id}", methods={"DELETE"})
     */
    public function deleteTondeuseController(int $id) {

        return $this->tc->getDeleteTondeuse($id);
    }



    /* ------PORTAIL------ */
    /**
     * Retrieves onePortailController
     * @Route("/oneportail/{id}", methods={"GET"})
     */
    public function onePortailController(int $id) {

        return $this->pc->getOnePortail($id);
    }

    /**
     * Retrieves allPortailsController
     * @Route("/allportails", methods={"GET"})
     */
    public function allPortailsController() {

        return $this->pc->getAllPortails();
    }

    /**
     * Retrieves addPortailController
     * @Route("/addportail", methods={"GET", "POST"})
     */
    public function addPortailController(Request $request) {

        return $this->pc->getAddPortail($request);
    }

    /**
     * Retrieves updatePortailController
     * @Route("/updateportail/{id}", methods={"GET", "PUT"})
     */
    public function updatePortailController(Request $request, int $id) {

        return $this->pc->getUpdatePortail($request, $id);
    }

    /**
     * Retrieves deletePortailController
     * @Route("/deleteportail/{id}", methods={"DELETE"})
     */
    public function deletePortailController(int $id) {

        return $this->pc->getDeletePortail($id);
    }


}
