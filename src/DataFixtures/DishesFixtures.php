<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Dishes;


class DishesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $hamburger = new Dishes();
        $hamburger->setName('Hamburger');
        $hamburger->setCountry('Germany');
        $hamburger->setRegime('meat');
        $hamburger->setSpicy(false);
        $hamburger->setNote(86);


        $manager->persist($hamburger);

        $manager->flush();
    }
}
