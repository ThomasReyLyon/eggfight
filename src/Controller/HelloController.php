<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

class HelloController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show()
    {
        $persons = 
        [
           ['name' => 'riri', 'age' => 10],
           ['name' => 'fifi', 'age' => 20],
           ['name' => 'loulou', 'age' => 30],
        ];

        $nom="Moi";

        return $this->twig->render('hello.html.twig', ['nom' => $nom, 'persons' => $persons]);
    }
}