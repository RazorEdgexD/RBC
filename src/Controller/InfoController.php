<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfoController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function infoAction()
    {
        $query = "
            {
              jackpot(locale: \"\", currency:\"RUB\"){
               amount
               currency
             }
             games(type: DESKTOP, brandId: \"\", page: 1, size: 9, category: \"Popular\"){
                content {
                  image
                  fullGameName
                }
              }
             topWinners(brandId:\"\",sort:\"winAmount.amount\", size: 5, currency:\"RUB\"){
                username
                date
                winAmount
                {
                  amount
                  currency
                }
             }
            }
            ";
        $data = ["query" => $query];
        $data_string = json_encode($data);

        $ch = curl_init('https://graphql.redboxcasino.com/graphql');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );

        $result = json_decode(curl_exec($ch))->data;
        return $this->render('info.html.twig', [
            'data' => $result ]);
    }
}