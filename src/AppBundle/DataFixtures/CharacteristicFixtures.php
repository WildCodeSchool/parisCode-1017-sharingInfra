<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Characteristic;
use Doctrine\Common\Persistence\ObjectManager;

class CharacteristicFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Create Characteristic restroom
        $restroom = new Characteristic();
        $restroom->setEquipment('restroom');
        $manager->persist($restroom);

        $this->addReference('characteristic-restroom', $restroom);

        //Create Characteristic cloakroom
        $cloakroom = new Characteristic();
        $cloakroom->setEquipment('cloakroom');
        $manager->persist($cloakroom);

        $this->addReference('characteristic-cloakroom', $cloakroom);

        $manager->flush();
    }

}