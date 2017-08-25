<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;

class UsersController extends Controller
{
    private $userManager;
    
    public function __construct()
    {
        $this->userManager = new UserManager;
        $this->userManager->setTable('users');
    }

    public function index()
    {
        // Controlle de l'accés
        $user = $this->getUser();

        if (!$user) {
            $this->redirectToRoute('security_signin');
        }

        // Récupération des données de l'utilisateur dans la BDD
        // Affichage de la vue du profil
        $this-> show('users/index', [
            "title" => "Bonjour ".$user['username'],
            "user" =>  $this->userManager->find($user['id'])
        ]);
    }
}