<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Characteristic;
use Doctrine\Common\Persistence\ObjectManager;

class CharacteristicFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $chiottes = new Characteristic();
        $chiottes->setEquipment('chiottes');

        $manager->persist($chiottes);
        $manager->flush();
    }
}