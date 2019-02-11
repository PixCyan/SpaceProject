<?php

namespace App\Controller;

use App\Entity\RobotA;
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
        //--- TODO
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
     * TEST
     */
    public function addRobot()
    {
        //$this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $currentUser = $this->getUser();

        $entityManager = $this->getDoctrine()->getManager();
        $robot = new RobotA();
        $robot->setUser($currentUser);
        $currentUser->addRobot($robot);

        $entityManager->persist($robot);
        $entityManager->flush();
    }
}
