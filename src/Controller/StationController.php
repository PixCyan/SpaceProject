<?php

namespace App\Controller;

use App\Entity\RobotA;
use App\Entity\RobotB;
use App\Entity\RobotC;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class StationController extends AbstractController
{

    /**
     * @Route("/station", name="app_main")
     *
     * @return Response
     */
    public function mainpage()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if ($this->getUser()) {
            /*
             * TODO -- 1
             *  Si l'utilisateur viens de s'enregistrer
             *  -> Début de dialogue avec Tétrys pour donner le contexte + choix conversations
             *  Si l'utilisateur a déjà eu le dialogue de Tétrys
             *  -> Choix dialogue avec Tétrys ou panneau de contrôl
             */

            //$this->addRobot();

            return $this->render('station/station.html.twig');
        } else {
            return $this->redirectToRoute('app_home');
        }
    }

    /**
     * @Route("/station/warehouse", name="app_warehouse")
     *
     * @return Response
     */
    public function showWerehouse()
    {
        //--- TODO CCS/JS
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $warehouse = [];

        if ($this->getUser()) {
            $user = $this->getUser();
            $warehouse = $user->getWarehouse();
        }

        return $this->render('station/warehouse.html.twig', [
            'warehouse' => $warehouse
        ]);
    }

    /**
     * @Route("/station/robot_shed", name="app_robot_shed")
     *
     * @return Response
     */
    public function showRobotShed()
    {
        //--- TODO CCS/JS
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $robots = [];

        if ($this->getUser()) {
            $user = $this->getUser();
            $robots = $user->getRobots();
        }

        return $this->render('station/robotShed.html.twig', [
            'robots' => $robots
        ]);
    }

    /**
     * @Route("/station/create_robot", name="app_create_robot")
     *
     * @param String $robotType
     */
    public function addRobot(String $robotType)
    {
        //$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        //TODO -- gestion du formulaire

        $currentUser = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();

        switch ($robotType) {
            default:
            case "robot_a":
                $robot = new RobotA();
                break;
            case "robot_b":
                $robot = new RobotB();
                break;
            case "robot_c":
                $robot = new RobotC();
                break;
        }

        $robot->setUser($currentUser);
        $currentUser->addRobot($robot);

        $entityManager->persist($robot);
        $entityManager->flush();
    }
}
