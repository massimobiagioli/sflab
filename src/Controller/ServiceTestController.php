<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Module\Dummy\Dummy;

class ServiceTestController extends Controller
{
    
    /**
     * @Route("/svctest", name="svctest")
     */
    public function tester(Request $request, Dummy $dummy)
    {
        return new Response('<html><body>Risultato: ' . $dummy->execute() . '</body></html>');
    }
    
}
