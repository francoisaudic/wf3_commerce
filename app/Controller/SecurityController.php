<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \W\Manager\UserManager;

class SecurityController extends Controller
{
    private $userManager;
    private $AuthManager;

    public function __construct()
    {
        $this->userManager = new UserManager;
        $this->userManager->setTable('users');

        $this->AuthManager = new AuthentificationManager;

    }

    public function signin()
    {
        $error = null;

        // If method POST
        if ( $_SERVER['REQUEST_METHOD'] === "POST" )
        {
            
            // Récupérer les données du formulaire
            $email = $_POST['user']['email'];
            $password = $_POST['user']['password'];
            
            // Vérifier les données (dans la bdd - Est ce que l'utilisateur existe ?)
            // Controller les identifiants (login + pwd)
            if ($userId = $this->AuthManager->isValidLoginInfo($email, $password) )
            {
                // Récupération des données de l'utilisateur dans la bdd
                $user = $this->userManager->find($userId);

                // Ajoute l'utilisateur à la SESSION
                $this->AuthManager->logUserIn($user);

                // Redirige l'utilisateur vers sa page profil
                $this->redirectToRoute('profile');
            }
            // échec de connexion
            else
            {
                // message d'erreur
                $error = "Erreur d'identification";
            }
            
        }
        // Affiche le formulaire d'identification
        $this->show('security/signin', [
            "title" => "Identification",
            "error" => $error,
        ]);
    }

    public function signup()
    {
        $username = null;
        $email = null;
        $password = null;
        $repeat_password = null;
        $error = null;

        // if method POST
        if ( $_SERVER['REQUEST_METHOD'] === "POST" )
        {
            $save = true;

            // Récupérer les données du formulaire
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeat_password = $_POST['repeat_password'];

            // - Controlle des données du POST
            // Controle de l'adresse email
            if ( empty($email) ) {
                $save = false;
                // message d'erreur
            } else if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
                $save = false;
                // message d'erreur
            }

            // Controle des 2 MDP saisis dans le formulaire
            if ( $password !== $repeat_password ) {
                $save = false;
                // message d'erreur
            }

            // Cryptage du MDP
            else
            {
                $password = password_hash($password, PASSWORD_DEFAULT);           
            }


            if ( $save )
            {
            // Test de l'existence de l'utilisateur (dans la bdd)

                // SI L'UTLISATEUR N'EXISTE PAS
                if ( !$this->userManager->emailExists($email) ) {

                    // On enregistre les données dans la BDD
                    $user = $this->userManager->insert([
                        "username" => $username,
                        "email" => $email,
                        "password" => $password,
                    ]);

                    // Ajoute l'utilisateur à la SESSION
                    $_SESSION['user'] = array(
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'username' => $user['username'],
                    );

                    // On redirige l'utilisateur vers sa page de profil
                    $this->redirectToRoute('profile');
                }
                // SI L'UTLISATEUR EXISTE
                else {
                    // On affiche un message d'erreur
                    $error = "Un utilisateur existe déjà avec l'adresse email : $email";
                }
            }
        }

        // Affiche le formulaire d'inscription
        $this->show('security/signup', [
            "title" => "Inscription",
            "username" => $username,
            "email" => $email,
            "error" => $error,
        ]);
    }

    public function logout()
    {
        // On detruit la SESSION
        $this->AuthManager->logUserOut();

        // On redirige vers la page d'accueil
        $this->redirectToRoute('home');
    }

    public function lostPwd()
    {
        // if method POST
        if ( $_SERVER['REQUEST_METHOD'] === "POST" )
        {
            // Récupération des données du POST
            $email = strip_tags( trim( $_POST['email'] ) );
            // Récupération de l'utilisateur dans la BDD (est ce que l'utilisateur existe ?)
            if ( $user = $this->userManager->getUserByUsernameOrEmail($email) )
            {
                // Generation du Token
                $token = array(
                    "token" => md5( \W\Security\StringUtils::randomString(32) ), // Token
                    "timeout" => time()+3600, // Timeout
                    "user_id" => $user['id'], // ID user
                );
                
                $tokensManager = new \Manager\TokensManager;
                $tokensManager->insert($token);
                // Envoi du mail avec le process de renouvellement du MDP

                // Affiche le message de prise en compte de la demande
            }
            // Pas d'utilisateur en BDD -> on affiche un message d'erreur
            else
            {

            }
        }

        // Affichage du formulaire (adresse email)
        $this->show('security/pwd/lost', [
            "title" => "Mot de passe oublié ?",
        ]);
    }

    public function resetPwd()
    {
        // If method POST
        if ( $_SERVER['REQUEST_METHOD'] === "POST" )
        {
            // Récupération des données du POST

            // Controle du Token

            // Controle des MDP

            // Récupération de l'utilisateur dans la BDD

            // M.A.J. du MDP dans la BDD

            // Redirige l'utilisateur vers la page signIN
        }
        // Affichage du formulaire
        $this->show('security/pwd/reset', [
            "title" => "Changer le mot de passe",
        ]);

    }
}
