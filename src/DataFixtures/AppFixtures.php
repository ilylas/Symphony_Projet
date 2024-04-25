<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\EnseignantFactory;
use App\Factory\MatiereFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        EnseignantFactory ::createMany(15);
        MatiereFactory ::createMany(10);
        $manager->flush();
    }
}
