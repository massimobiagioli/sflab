<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Service\ModelServiceManager;
use App\Entity\Persona;


class CrudController extends Controller
{
    private $modelServiceManager;
    
    public function __construct(ModelServiceManager $modelServiceManager)
    {
        $this->modelServiceManager = $modelServiceManager;
    }
    
    /**
     * @Route("/crud/management/{modelKey}", name="crud_management")
     */
    public function management(Request $request, $modelKey)
    {
        return $this->render("crud/management/$modelKey.html.twig", ['modelKey' => $modelKey]);
    }
    
    /**
     * @Route("/crud/detail/{modelKey}", name="crud_detail")
     */
    public function detail(Request $request, $modelKey)
    {
        return $this->render("crud/detail/$modelKey.html.twig");
    }
    
    /**
     * @Route("/crud/management/query/{modelKey}", name="crud_management_query")
     * @Method({"POST"})
     */
    public function query(Request $request, $modelKey)
    {
        $modelService = $this->modelServiceManager->getModelService($modelKey);
        $count = $modelService->count();
        
        $repo = $this->getDoctrine()
            ->getRepository(Persona::class);
        
//        // Count
//        $count = $repo->createQueryBuilder('p')
//            ->select('count(p.id)')
//            ->getQuery()
//            ->getSingleScalarResult();
        
        // TODO: Effettuare ricerca
        $query = $repo->createQueryBuilder('p')
//            ->where('p.nominativo LIKE :nominativo')
//            ->setParameter('nominativo', '%adbe%')
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->setFirstResult($request->get('start'))
            ->getQuery();
        
        $personaCollection = $query->getResult();
        
        $toReturn = [
            'draw' => intval($request->get('draw')),
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => []
        ];
        
        foreach ($personaCollection as $persona)
        {
            $toReturn['data'][] = [
                $persona->getId(),
                $persona->getNominativo(),
                $persona->getIndirizzo(),
                '<div>Actions ...</div>'
            ];
        }
        
        return new Response(
            json_encode($toReturn),
            Response::HTTP_OK,
            array('content-type' => 'application/json')
        );
    }
    
}
