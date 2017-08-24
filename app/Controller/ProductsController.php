<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ProductsManager;

class ProductsController extends Controller
{
    private $producstManager;

    public function __construct()
    {
        $this->productsManager = new ProductsManager;
    }

    public function index()
	{
        $products = $this->productsManager->findAll();

		$this->show('products/index', [
            "title" => "Liste des Produits",
            "products" => $products,
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

                $products = $this->productsManager;

                $product = $products->insert([
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

		$this->show('products/create', [
            "title" => "Ajouter un produit",
            "name" => $name,
            "description" => $description,
            "image" => $image,
            "price" => $price,
        ]);
    }

    public function read($id)
	{
        $products = $this->productsManager;

        $product = $products->find($id);

		$this->show('products/read', [
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
        $products = $this->productsManager;
        
        $product = $products->find($id);

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

                $products = $this->productsManager;

                $product = $products->update([
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

		$this->show('products/update', [
            "title" => "Modifier : ".$product['name'],
            "name" => $product['name'],
            "description" => $product['description'],
            "image" => $product['image'],
            "price" => $product['price'],
        ]);
    }

    public function delete($id)
	{
        $products = $this->productsManager;
        
        $product = $products->find($id);

        if ( $_SERVER['REQUEST_METHOD'] === "POST" ) {
            $this->productsManager->delete($id);
            $this->redirectToRoute('products_index');
        }

		$this->show('products/delete', [
            "title" => "Suppression du produit :".$product['name'],
            "product" => $product,
        ]);
    }
}