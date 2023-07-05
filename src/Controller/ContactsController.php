<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactsController extends AbstractController
{
    #[Route('/', name: 'app_contacts')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $contacts = new Contacts();

        $form = $this->createForm(ContactsType::class, $contacts);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->getData()) {

            if ($form->isValid()) {
                $contacts = $form->getData();
                $entityManagerInterface->persist($contacts);
                $entityManagerInterface->flush();

                $this->addFlash('success', true);

                $this->redirectToRoute('app_contacts'); //prevents user from reposting data.
            } else {
                $this->addFlash('success', false);
                $this->redirectToRoute('app_contacts');
            }
        }

        return $this->render('contacts/index.html.twig', [
            'contactForm' => $form->createView(),
        ]);
    }
}
