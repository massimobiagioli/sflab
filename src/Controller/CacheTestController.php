<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CacheTestController extends Controller
{
    /**
     * @Route("/cachetest", name="cachetest")
     */
    public function tester(Request $request)
    {
        $cache = $this->get('cache.app');
        dump($cache);
        
        $dummyItem = $cache->getItem('dummy.dummyItem');
        $dummyItem->set('asdf1234');
        $cache->save($dummyItem);
        
        $dummyItem = $cache->getItem('dummy.dummyItem');
        dump($dummyItem);
        
        $dummyItemX = $cache->getItem('dummy.dummyItemX');
        dump($dummyItemX);
        
        return new Response('<html><body>Valore letto dalla cache: ' . $dummyItem->get() . '</body></html>');
    }
    
}
