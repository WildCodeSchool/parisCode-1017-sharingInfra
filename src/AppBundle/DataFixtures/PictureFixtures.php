<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Picture;

class PictureFixtures extends Fixture
{
    public function load(ObjectManager $manager){

            //create new Picture hipster
            $hipster = new Picture();
            $hipster->setUrl('http://i.telegraph.co.uk/multimedia/archive/03046/hipster-tash_3046941b.jpg');
            $manager->persist($hipster);

            $this->addReference('picture-hipster', $hipster);

            //create new Picture mickey
            $mickey = new Picture();
            $mickey->setUrl('https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Mickey_Mouse_head_and_ears.svg/2000px-Mickey_Mouse_head_and_ears.svg.png');
            $manager->persist($mickey);

            $this->addReference('picture-mickey', $mickey);

            //create new Picture minnie
            $minnie = new Picture();
            $minnie->setUrl('https://i.pinimg.com/736x/8c/86/0a/8c860a94adc544d2c7590253f6672ad3--minnie-mouse-party-mouse-parties.jpg');
            $manager->persist($minnie);

            $this->addReference('picture-minnie', $minnie);

            //create new Picture gumball
            $gumball = new Picture();
            $gumball->setUrl('http://i.cdn.turner.com/v5cache/CARTOON/site/Images/i79/gumball_gumball_180x180.png');
            $manager->persist($gumball);

            $this->addReference('picture-gumball', $gumball);

            //create new Picture bordeaux
            $bordeaux = new Picture();
            $bordeaux->setUrl('https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Place_de_la_Bourse%2C_Bordeaux%2C_France.jpg/280px-Place_de_la_Bourse%2C_Bordeaux%2C_France.jpg');
            $manager->persist($bordeaux);

            $this->addReference('picture-bordeaux', $bordeaux);

            //create new Picture nice
            $nice = new Picture();
            $nice->setUrl('http://iloveniceparis.com/wp-content/uploads/2017/03/1463569446.jpeg');
            $manager->persist($nice);

            $this->addReference('picture-nice', $nice);

            $manager->flush();
    }

}