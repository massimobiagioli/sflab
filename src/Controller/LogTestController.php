<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;

class LogTestController extends Controller
{
    /**
     * @Route("/logtest", name="logtest")
     */
    public function tester(Request $request, LoggerInterface $logger)
    {
        dump($logger);
        
        $logger->info('Info message test');
        
        return new Response('<html><body>Logger Test</body></html>');
    }
    
}
