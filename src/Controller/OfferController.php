<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OfferController extends AbstractController
{
    #[Route('/offer/create/step1', name: 'offer_create_step1')]
    public function createOfferOne(Request $request){
        $sessionData = $request->getSession()->get('offer_data', []);
        return $this->render('offer/create_step1.html.twig', [
            'data' => $sessionData
        ]);
    }

    #[Route('/offer/create/step2', name: 'offer_create_step2')]
    public function submitStepOne(Request $request): Response
    {
        $data = $request->getSession()->get('offer_data', []);
        if ($request->isMethod('POST')) {
            $data['licensePlate'] = $request->request->get('licensePlate');
            $request->getSession()->set('offer_data', $data);
        }
        dd($data);
    }

}
