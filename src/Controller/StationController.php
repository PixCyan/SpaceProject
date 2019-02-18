<?php

namespace App\Controller;

use App\Entity\Robot;
use App\Entity\RobotA;
use App\Entity\RobotB;
use App\Entity\RobotC;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function addRobot(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('robot_type', ChoiceType::class, [
                'label' => 'Type de robot',
                'choices'  => [
                    'Aucun' => 'aucun',
                    'Robot A' => 'robot_a',
                    'Robot B' => 'robot_b',
                    'Robot C' => 'robot_c'
                ],
            ])
            ->add('save', SubmitType::class, ['label' => 'Créer'])
            ->getForm();

        //TODO -- gestion du formulaire
        $formValue = $request->request->all();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $robotType = $form->getData();
            $robotType = $robotType["robot_type"];

            if($robotType != 'aucun') {
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

                //TODO afficher message success en revenant sur la page
                return $this->redirectToRoute('app_robot_shed');
            }
        }

        return $this->render('station/createRobot.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/station/delete_robot/{robotId}", name="app_delete_robot")
     * @param $robotId
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function deleteRobot(Request $request,$robotId)
    {
        $robot = $this->getDoctrine()
            ->getRepository(Robot::class)
            ->find($robotId);

        if (!$robot) {
            throw $this->createNotFoundException(
                'No robot found for id '.$robotId
            );
        }
        $currentUser = $this->getUser();
        $currentUser->removeRobot($robot);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($robot);
        $entityManager->flush();

        //TODO afficher message success en revenant sur la page
        return $this->redirectToRoute('app_robot_shed');
    }


}
