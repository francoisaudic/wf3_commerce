<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ArticlesManager;

class ArticlesController extends Controller
{
    private $articlesManager;

    public function __construct()
    {
        $this->articlesManager = new ArticlesManager;
    }

    public function index()
	{
        $articles = $this->articlesManager->findAll();

		$this->show('articles/index', [
            "title" => "Liste des Produits",
            "articles" => $articles,
        ]);
    }
    
    public function create()
	{
        $name = null;
        $description = null;
        $image = null;
        $price = null;

        if ( $_SERVER['REQUEST_METHOD'] === "POST" ) {

            $save = true;

            // Récupération des données $_POST
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $price = $_POST['price'];

            // Controle et formatage des données

            // Enregistre en BDD
            if ($save) {

                $articles = $this->articlesManager;

                $product = $articles->insert([
                    "name" => $name,
                    "description" => $description,
                    "image" => $image,
                    "price" => $price,
                ]);

                // Recupération du dernier ID
                $productID = $product['id'];
            
                // Redirige vers la page de l'article
                $this->redirectToRoute('product_read', [
                    'id' => $productID,
                ]);
            }
        }

		$this->show('articles/create', [
            "title" => "Ajouter un produit",
            "name" => $name,
            "description" => $description,
            "image" => $image,
            "price" => $price,
        ]);
    }

    public function read($id)
	{
        $articles = $this->articlesManager;

        $product = $articles->find($id);

		$this->show('articles/read', [
            "title" => "Info d'un produit",
            'id' => $product['id'],
            "name" => $product['name'],
            "description" => $product['description'],
            "image" => $product['image'],
            "price" => $product['price'],
        ]);
    }

    public function update($id)
	{
        $articles = $this->articlesManager;
        
        $product = $articles->find($id);

        if ( $_SERVER['REQUEST_METHOD'] === "POST" ) {

            $save = true;

            // Récupération des données $_POST
            $name = $_POST['name'];
            $description = $_POST['description'];
            $image = $_POST['image'];
            $price = $_POST['price'];

            // Controle et formatage des données

            // Enregistre en BDD
            if ($save) {

                $articles = $this->articlesManager;

                $product = $articles->update([
                    "name" => $name,
                    "description" => $description,
                    "image" => $image,
                    "price" => $price,
                ], $id);

                // Recupération du dernier ID
                $productID = $product['id'];
            
                // Redirige vers la page de l'article
                $this->redirectToRoute('product_read', [
                    'id' => $productID,
                ]);
            }
        }

		$this->show('articles/update', [
            "title" => "Modifier : ".$product['name'],
            "name" => $product['name'],
            "description" => $product['description'],
            "image" => $product['image'],
            "price" => $product['price'],
        ]);
    }

    public function delete($id)
	{
        $articles = $this->articlesManager;
        
        $product = $articles->find($id);

        if ( $_SERVER['REQUEST_METHOD'] === "POST" ) {
            $this->articlesManager->delete($id);
            $this->redirectToRoute('articles_index');
        }

		$this->show('articles/delete', [
            "title" => "Suppression du produit :".$product['name'],
            "product" => $product,
        ]);
    }
}