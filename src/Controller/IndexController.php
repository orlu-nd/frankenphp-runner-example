<?php

namespace App\Controller;

use App\Form\UploadFileFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {
        $uploadFileForm = $this->createForm(UploadFileFormType::class);
        $uploadFileForm->handleRequest($request);

        if($uploadFileForm->isSubmitted() && $uploadFileForm->isValid()) {
            return $this->render('success.html.twig');
        }

        return $this->render('base.html.twig', [
            'uploadFileForm' => $uploadFileForm->createView(),
        ]);
    }
}
