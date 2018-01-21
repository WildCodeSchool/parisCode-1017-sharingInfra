<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Picture;

class PictureFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

            //create new Picture hipster
            $hipster = new Picture();
            $hipster->setUrl('http://i.telegraph.co.uk/multimedia/archive/03046/hipster-tash_3046941b.jpg');
            $manager->persist($hipster);

            $this->addReference('picture-hipster', $hipster);

            //create new Picture bordeaux
            $bordeaux = new Picture();
            $bordeaux->setUrl('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Place_de_la_Bourse%2C_Bordeaux%2C_France.jpg/280px-Place_de_la_Bourse%2C_Bordeaux%2C_France.jpg');
            $manager->persist($bordeaux);
            $this->addReference('picture-bordeaux', $bordeaux);

            $nice = new Picture();
            $nice->setUrl('http://iloveniceparis.com/wp-content/uploads/2017/03/1463569446.jpeg');
            $manager->persist($nice);
            $this->addReference('picture-nice', $nice);

            $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}