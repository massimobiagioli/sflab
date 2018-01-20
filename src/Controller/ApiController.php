<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use \App\Service\ModelServiceManager;

class ApiController extends Controller
{
    
    private $modelServiceManager;
    
    public function __construct(ModelServiceManager $modelServiceManager)
    {
        $this->modelServiceManager = $modelServiceManager;
    }
    
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
    
    /**
     * @Route("/api/servicetest", name="api_servicetest")
     */
    public function servicetest(Request $r)
    {
//        $modelService = $this->modelServiceManager->getModelService('persona');
//        $count = $modelService->count();
        
//        return new Response(
//            print_r($r, true),
//            Response::HTTP_OK,
//            array('content-type' => 'text/html')
//        );
        
        dump($r);
    }
    
}
