<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CrudController extends Controller
{
    /**
     * @Route("/crud/management/{model}", name="crud_management_{model}")
     */
    public function management(Request $request, $model)
    {
        return $this->render("crud/management/$model.html.twig");
    }
    
    /**
     * @Route("/crud/detail/{model}", name="crud_detail_{model}")
     */
    public function detail(Request $request, $model)
    {
        return $this->render("crud/detail/$model.html.twig");
    }
    
}
