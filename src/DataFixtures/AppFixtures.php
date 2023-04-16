<?php

namespace App\DataFixtures;

use App\Factory\FamilyFactory;
use App\Factory\GenusFactory;
use App\Factory\PlantFactory;
use App\Factory\SpeciesFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        PlantFactory::createMany(30);
        GenusFactory::createMany(30);
        FamilyFactory::createMany(30);
        SpeciesFactory::createMany(30);
        UserFactory::createMany(5);

        $manager->flush();
    }
}
