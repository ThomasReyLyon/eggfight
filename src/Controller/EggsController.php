<?php


namespace App\Controller;

use GuzzleHttp\Client;

class EggsController extends AbstractController
{

    public function eggsSucks()
    {


        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://easteregg.wildcodeschool.fr/api/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', 'eggs/random'); // DANS URI --> METTRE REQUETE GET que vous voulez utiliser. Liste des requêtes ci dessous.
/*
		GET /api/eggs
    GET /api/eggs/:id
    GET /api/eggs/random
    GET /api/characters
    GET /api/characters/:id
    GET /api/characters/random
http://easteregg.wildcodeschool.fr/api-docs/
*/
        $data=$response->getBody();


        $data=\GuzzleHttp\json_decode($data); // Ici, ça va ressortir le resultat de la réquete de la ligne plus haut $client->request. Si random ou si :id, ça ressortira UN SEUL oeuf
											// DONC UN SEUL TABLEAU. SI la formule est simplement eggs/ ou characters/, ça va ressortir TOUS les oeufs. Donc UN TABLEAU DANS UN TABLEAU.
											// Et là, c'est plus galère du coup.


//var_dump($data);



        return $this->twig->render('suck_my_egg.html.twig', [
        'egg'=>$data,

        ]);
    }
}
