<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * @Route("/api/demo", name="api_demo")
     */
    public function demo()
    {
        $fakeData = [
            [
                'nome' => 'Mario',
                'cognome' => 'Rossi'
            ],
            [
                'nome' => 'Anna',
                'cognome' => 'Verdi'
            ],
        ];
        
        return new Response(
            json_encode($fakeData),
            Response::HTTP_OK,
            array('content-type' => 'application/json')
        );
    }
    
    /**
     * @Route("/api/demopost", name="api_demopost")
     * @Method({"POST"})
     */
    public function demopost()
    {
        $fakeData = [
            [
                'nome' => 'Mario',
                'cognome' => 'Rossi'
            ],
            [
                'nome' => 'Anna',
                'cognome' => 'Verdi'
            ],
        ];
        
        return new Response(
            json_encode($fakeData),
            Response::HTTP_OK,
            array('content-type' => 'application/json')
        );
    }
    
}
