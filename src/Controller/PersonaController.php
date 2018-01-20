<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Persona;

class PersonaController extends Controller
{
    /**
     * @Route("/__persona", name="persona_index")
     */
    public function index(Request $request)
    {
        $persona = new Persona;
        
        $form = $this->createFormBuilder($persona)
            ->add('nominativo', TextType::class, array('attr' => array('class' => 'form-input')))
            ->add('indirizzo', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Inserisci'))
            ->getForm();
        
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $formData = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();
            
            dump($formData);
        }
        
        return $this->render('persona/index.html.twig', ['form' => $form->createView()]);
    }
    
}
