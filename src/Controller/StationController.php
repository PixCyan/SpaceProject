<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

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
             *  -> Début de dialogue avec Tétrys pour donner le contexte + choix conversation
             *  Si l'utilisateur a déjà eu le dialogue de Tétrys
             *  -> Choix dialogue avec Tétrys ou panneau de contrôl
             */
            return $this->render('main/main.html.twig');
        } else {
            return $this->redirectToRoute('app_home');
        }
    }
}
