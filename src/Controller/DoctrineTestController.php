<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Persona;

class DoctrineTestController extends Controller
{
    
    /**
     * @Route("/dtest/insert", name="dtest_insert")
     */
    public function insert(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $persona = new Persona;
        $persona->setNominativo('Mario Rossi');
        $persona->setIndirizzo('via ancona 123, Jesi(AN)');
        
        $em->persist($persona);
        
        $em->flush();
        
        return new Response('<html><body>Persona inserita: ' . $persona->getId() . '</body></html>');
    }
    
    /**
     * @Route("/dtest/update", name="dtest_update")
     */
    public function update(Request $request)
    {
        $persona = $this->getById($request->get('id'));
        
        if (!$persona) {
            return new Response('<html><body>Persona non trovata!!!</body></html>');
        }
        
        $em = $this->getDoctrine()->getManager();
        
        $persona->setIndirizzo('via ascoli piceno 2, Jesi(AN)');
        
        $em->flush();
        
        return new Response('<html><body>Persona modificata: ' . $persona->getId() . '</body></html>');
    }
    
    /**
     * @Route("/dtest/delete", name="dtest_delete")
     */
    public function delete(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        // Se non si effettua la rilettura da db, dà errore perchè un 
        // detached object non può essere manipolato dall'entity manager
        $id = $request->get('id');
        $persona = $this->getById($id);
        
        $em->remove($persona);
        
        $em->flush();
        
        return new Response('<html><body>Persona eliminata: ' . $id . '</body></html>');
    }
    
    /**
     * @Route("/dtest/insert_batch", name="dtest_insert_batch")
     */
    public function insertBatch(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        for ($i = 0; $i < 100; $i++) {
            $persona = new Persona;
            $hash = md5(uniqid());
            $persona->setNominativo("Persona $hash");
            $persona->setIndirizzo("Indirizzo $hash");
            $em->persist($persona);
        }
        
        $em->flush();
        
        return new Response('<html><body>Inserimento batch effettuato</body></html>');
    }
    
    /**
     * @Route("/dtest/dql", name="dql")
     */
    public function dql(Request $request)
    {
        $repo = $this->getDoctrine()
            ->getRepository(Persona::class);
        
        $query = $repo->createQueryBuilder('p')
            ->where('p.nominativo LIKE :nominativo')
            ->setParameter('nominativo', '%adbe%')
            ->orderBy('p.id', 'ASC')
            ->getQuery();
        
        $result = $query->getResult();
        
        return new Response('<html><body><pre>' . print_r($result, true) . '</pre></body></html>');
    }
    
    private function getById($id) {
        return $this->getDoctrine()
            ->getRepository(Persona::class)
            ->find($id);
    }
}
