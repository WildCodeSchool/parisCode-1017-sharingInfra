<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Picture;

class PictureFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

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

        //create new Picture piscine8
        $piscine8 = new Picture();
        $piscine8->setName('piscine8.jpeg');
        $manager->persist($piscine8);

        $this->addReference('picture-piscine8', $piscine8);

        //create new Picture piscine9
        $piscine9 = new Picture();
        $piscine9->setName('piscine9.jpeg');
        $manager->persist($piscine9);

        $this->addReference('picture-piscine9', $piscine9);

        //create new Picture piscine10
        $piscine10 = new Picture();
        $piscine10->setName('piscine10.jpeg');
        $manager->persist($piscine10);

        $this->addReference('picture-piscine10', $piscine10);

        //create new Picture piscine11
        $piscine11 = new Picture();
        $piscine11->setName('piscine11.jpeg');
        $manager->persist($piscine11);

        $this->addReference('picture-piscine11', $piscine11);

        //create new Picture piscine12
        $piscine12 = new Picture();
        $piscine12->setName('piscine12.jpeg');
        $manager->persist($piscine12);

        $this->addReference('picture-piscine12', $piscine12);

        //create new Picture piscine13
        $piscine13 = new Picture();
        $piscine13->setName('piscine13.jpeg');
        $manager->persist($piscine13);

        $this->addReference('picture-piscine13', $piscine13);

        //create new Picture piscine14
        $piscine14 = new Picture();
        $piscine14->setName('piscine14.jpeg');
        $manager->persist($piscine14);

        $this->addReference('picture-piscine14', $piscine14);

        //create new Picture piscine15
        $piscine15 = new Picture();
        $piscine15->setName('piscine15.jpeg');
        $manager->persist($piscine15);

        $this->addReference('picture-piscine15', $piscine15);

        //create new Picture piscine16
        $piscine16 = new Picture();
        $piscine16->setName('piscine16.jpeg');
        $manager->persist($piscine16);

        $this->addReference('picture-piscine16', $piscine16);

        //create new Picture piscine17
        $piscine17 = new Picture();
        $piscine17->setName('piscine17.jpeg');
        $manager->persist($piscine17);

        $this->addReference('picture-piscine17', $piscine17);

        //create new Picture piscine18
        $piscine18 = new Picture();
        $piscine18->setName('piscine18.jpeg');
        $manager->persist($piscine18);

        $this->addReference('picture-piscine18', $piscine18);

        //create new Picture piscine19
        $piscine19 = new Picture();
        $piscine19->setName('piscine19.jpeg');
        $manager->persist($piscine19);

        $this->addReference('picture-piscine19', $piscine19);

        //create new Picture piscine20
        $piscine20 = new Picture();
        $piscine20->setName('piscine20.jpeg');
        $manager->persist($piscine20);

        $this->addReference('picture-piscine20', $piscine20);

        //create new Picture piscine21
        $piscine21 = new Picture();
        $piscine21->setName('piscine21.jpeg');
        $manager->persist($piscine21);

        $this->addReference('picture-piscine21', $piscine21);

        //create new Picture piscine22
        $piscine22 = new Picture();
        $piscine22->setName('piscine22.jpeg');
        $manager->persist($piscine22);

        $this->addReference('picture-piscine22', $piscine22);

        //create new Picture piscine23
        $piscine23 = new Picture();
        $piscine23->setName('piscine23.jpeg');
        $manager->persist($piscine23);

        $this->addReference('picture-piscine23', $piscine23);

        //create new Picture piscine24
        $piscine24 = new Picture();
        $piscine24->setName('piscine24.jpeg');
        $manager->persist($piscine24);

        $this->addReference('picture-piscine24', $piscine24);

        //create new Picture tennis1
        $tennis1 = new Picture();
        $tennis1->setName('tennis1.jpg');
        $manager->persist($tennis1);

        $this->addReference('picture-tennis1', $tennis1);

        $manager->flush();
    }

}