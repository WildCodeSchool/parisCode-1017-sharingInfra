<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Characteristic;
use Doctrine\Common\Persistence\ObjectManager;

class CharacteristicFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Create Characteristic wc
        $wc = new Characteristic();
        $wc->setEquipment('wc');
        $manager->persist($wc);

        $this->addReference('characteristic-wc', $wc);

        //Create Characteristic vestiaire
        $vestiaire = new Characteristic();
        $vestiaire->setEquipment('vestiaire');
        $manager->persist($vestiaire);

        $this->addReference('characteristic-vestiaire', $vestiaire);

        //Create Characteristic douche
        $douche = new Characteristic();
        $douche->setEquipment('douche');
        $manager->persist($douche);

        $this->addReference('characteristic-douche', $douche);

        //Create Characteristic wifi
        $wifi = new Characteristic();
        $wifi->setEquipment('wifi');
        $manager->persist($wifi);

        $this->addReference('characteristic-wifi', $wifi);

        //Create Characteristic raquettes
        $raquettes = new Characteristic();
        $raquettes->setEquipment('raquettes');
        $manager->persist($raquettes);

        $this->addReference('characteristic-raquettes', $raquettes);

        //Create Characteristic bouees
        $bouees = new Characteristic();
        $bouees->setEquipment('bouees');
        $manager->persist($bouees);

        $this->addReference('characteristic-bouees', $bouees);

        //Create Characteristic parasol
        $parasol = new Characteristic();
        $parasol->setEquipment('parasol');
        $manager->persist($parasol);

        $this->addReference('characteristic-parasol', $parasol);

        //Create Characteristic serviettes
        $serviettes = new Characteristic();
        $serviettes->setEquipment('serviettes');
        $manager->persist($serviettes);

        $this->addReference('characteristic-serviettes', $serviettes);

        $manager->flush();
    }

}