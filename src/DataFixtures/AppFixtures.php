<?php

namespace App\DataFixtures;

use App\Entity\CategorieServices;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Egulias\EmailValidator\Result\ValidEmail;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        // mise en place des différentes catégories dans la DB via clé du champ et valeur du champ
    // je vais INCLURE mes données présentes dans le fichier DataCategories
    require 'DataCategories.php';

        // parcourir le tableau
        foreach ($metiers as $key => $categorie) {

            // création de l'objet categorie de services
            $categorieServices = new CategorieServices();

            // on va setter les informations on va hydrater la class avec les informations 
            $categorieServices->setImage($categorie['image_id']);
            $categorieServices->setNom($categorie['nom']);
            $categorieServices->setDescription($categorie['description']);
            $categorieServices->setEnAvant($categorie['en_avant']);
            $categorieServices->setValide($categorie['valide']);

            // on va persister
            $manager->persist( $categorieServices);

        }

        // Envoie dans la DB de ce qui a été persister au préalable
        $manager->flush();
    }
}
