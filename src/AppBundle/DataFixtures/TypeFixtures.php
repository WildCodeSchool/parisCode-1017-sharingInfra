<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Type;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //create Type swimmingpool
        $swimmingpool = new Type();
        $swimmingpool->setGearType('piscine');
        $manager->persist($swimmingpool);

        $this->addReference('type-swimmingpool', $swimmingpool);

        //create Type tenniscourt
        $tennisCourt = new Type();
        $tennisCourt->setGearType('court de tennis');
        $manager->persist($tennisCourt);

        $this->addReference('type-tenniscourt', $tennisCourt);

        $manager->flush();
    }

}