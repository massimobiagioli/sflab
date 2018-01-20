<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Service\ModelServiceManager;
use App\Service\QueryData;
use App\Dictionary\ModelDictionaryManager;

class CrudController extends Controller
{
    private $modelServiceManager;
    private $modelDictionaryManager;
    
    public function __construct(ModelServiceManager $modelServiceManager, ModelDictionaryManager $modelDictionaryManager)
    {
        $this->modelServiceManager = $modelServiceManager;
        $this->modelDictionaryManager = $modelDictionaryManager;
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
        // Get ModelDictionary
        $modelDictionary = $this->modelDictionaryManager->getModelDictionary($modelKey);
        
        // Init QueryData
        $queryData = new QueryData();
        $queryData->setLimit($request->get('length'));
        $queryData->setOffset($request->get('start'));
        
        // Add Filters to QueryData
        $filters = $modelDictionary->filtersFromDataTable($request->get('search'));
        $queryData->addFilters($filters);
        
        // Add OrderCriterions to QueryData
        $orderCriterion = $modelDictionary->orderCriterionFromDataTable($request->get('order'));
        $queryData->addOrderCriterion($orderCriterion);
        
        // Get ModelService
        $modelService = $this->modelServiceManager->getModelService($modelKey);
        
        // Call ModelService count() and query() methods
        $count = $modelService->count($queryData);
        $results = $modelService->query($queryData);
        
        // Prepare DataTable results
        $dataTableResult = [
            'draw' => intval($request->get('draw')),
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => []
        ];
        
        // Adapct DataTable Result
        $modelDictionary->adaptDataTableResult($results, $dataTableResult);
        
        return new Response(
            json_encode($dataTableResult),
            Response::HTTP_OK,
            array('content-type' => 'application/json')
        );
    }
    
}
