<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Picture;

class PictureFixtures extends Fixture
{
    public function load(ObjectManager $manager){

            //create new Picture piscine1
            $piscine1 = new Picture();
            $piscine1->setName('piscine1.jpg');
            $manager->persist($piscine1);

            $this->addReference('picture-piscine1', $piscine1);

            //create new Picture piscine2
            $piscine2 = new Picture();
            $piscine2->setName('piscine2.jpg');
            $manager->persist($piscine2);

            $this->addReference('picture-piscine2', $piscine2);

            //create new Picture piscine3
            $piscine3 = new Picture();
            $piscine3->setName('piscine3.jpeg');
            $manager->persist($piscine3);

            $this->addReference('picture-piscine3', $piscine3);

            //create new Picture piscine4
            $piscine4 = new Picture();
            $piscine4->setName('piscine4.jpeg');
            $manager->persist($piscine4);

            $this->addReference('picture-piscine4', $piscine4);

            //create new Picture piscine5
            $piscine5 = new Picture();
            $piscine5->setName('piscine5.jpeg');
            $manager->persist($piscine5);

            $this->addReference('picture-piscine5', $piscine5);

            //create new Picture piscine6
            $piscine6 = new Picture();
            $piscine6->setName('piscine6.jpeg');
            $manager->persist($piscine6);

            $this->addReference('picture-piscine6', $piscine6);

            //create new Picture piscine7
            $piscine7 = new Picture();
            $piscine7->setName('piscine7.jpeg');
            $manager->persist($piscine7);

            $this->addReference('picture-piscine7', $piscine7);

            //create new Picture tennis1
            $tennis1 = new Picture();
            $tennis1->setName('tennis1.jpg');
            $manager->persist($tennis1);

            $this->addReference('picture-tennis1', $tennis1);

            $manager->flush();
    }

}