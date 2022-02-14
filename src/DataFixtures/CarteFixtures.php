<?php
namespace App\DataFixtures;

use App\Entity\Carte;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker;

class CarteFixtures extends Fixture
{

    // AVEC FAKER
    public function load(ObjectManager $om)
    {
        $faker = Faker\Factory::create('fr_FR');
        // Création Carte sans le HYDRATE avec boucle pour en mettre pleins
        for ($i=0; $i < 10; $i++) { 
            $a1 = new Carte();
            $a1->setNom($faker->name()); // avec ou sans () c'est la même
            $a1->setRace($faker->country());
            $a1->setAvatar('https://picsum.photos/id/' . rand(1,1000) . '/200/100');
            $om->persist($a1);
        }
        $om->flush();
    }

}