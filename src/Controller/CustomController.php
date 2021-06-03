<?php

declare(strict_types=1);

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CustomController extends AbstractController
{
    /**
     * @Route ("/numbers/get")
     * @return Response
     * @throws Exception
     */
    public function getNumbers(): Response
    {
        //test
        $numbers = [];
        for ($i = 0; $i < 10; $i++) {
            $numbers[] = random_int(0, 100);
        }
        if (count($numbers) > 0) {
            return $this->render('custom/random_numbers.html.twig', ['response' => new Response(json_encode($numbers))]);
        }

        return new Response('No numbers were generated', 404);
    }
}
