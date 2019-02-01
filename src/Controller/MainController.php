<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class MainController extends AbstractController
{

    /**
     * @Route("/home")
     *
     * @return Response
     */
    public function homepage() {
        $test = "todo";

        //demander connexion ou nouvel utilisateur
        return $this->render('main/home.html.twig', [
            'test' => $test,
        ]);
    }



    /**
     * - Test
     * @Route("/lucky/number")
     *
     * @return Response
     */
    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}