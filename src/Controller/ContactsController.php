<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactsController extends AbstractController
{
    #[Route('/', name: 'app_contacts')]
    public function index(): Response
    {

        $contacts = new Contacts();

        $form = $this->createForm(ContactsType::class, $contacts);

        return $this->render('contacts/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }
}
