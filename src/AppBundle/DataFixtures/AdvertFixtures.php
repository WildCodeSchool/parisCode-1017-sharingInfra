<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Advert;


class AdvertFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
//      Create Advert poolABordeaux
        $poolABordeaux = new Advert();
        $poolABordeaux->setAddress('Bordeaux');
        $poolABordeaux->setTitle('Une piscine à Bordeaux');
        $poolABordeaux->setDescription('Une belle piscine à Bordeaux ! What else ?');
        $poolABordeaux->setPrice(45);
        $poolABordeaux->setLatitude(44.953308);
        $poolABordeaux->setLongitude(-0.597129);
        $poolABordeaux->setType($this->getReference('type-swimmingpool'));
        $poolABordeaux->addPicture($this->getReference('picture-bordeaux'));
        $poolABordeaux->addCharacteristic($this->getReference('characteristic-restroom'));
        $poolABordeaux->setUser($this->getReference('user-cindy'));

        $manager->persist($poolABordeaux);

        $this->addReference('advert-pool-bordeaux', $poolABordeaux);


        //Create Advert courtANice
        $courtANice = new Advert();
        $courtANice->setAddress('Nice');
        $courtANice->setTitle('Un court de tennis à Nice');
        $courtANice->setDescription('Un court de tennis à Nice! What else ?');
        $courtANice->setPrice(55);
        $courtANice->setLatitude(43.7101728);
        $courtANice->setLongitude(7.2619532);
        $courtANice->setType($this->getReference('type-tenniscourt'));
        $courtANice->addPicture($this->getReference('picture-nice'));
        $courtANice->addCharacteristic($this->getReference('characteristic-cloakroom'));
        $courtANice->setUser($this->getReference('user-caroline'));

        $manager->persist($courtANice);

        $this->addReference('advert-tennis-nice', $courtANice);



        //Create Advert courtANeuilly
        $courtANeuilly = new Advert();
        $courtANeuilly->setAddress('Neuilly');
        $courtANeuilly->setTitle('Un court de tennis à Neuilly');
        $courtANeuilly->setDescription('Un court de tennis à Neuilly! What else ?');
        $courtANeuilly->setPrice(85);
        $courtANeuilly->setLatitude(48.8846000);
        $courtANeuilly->setLongitude(2.2696500);
        $courtANeuilly->setType($this->getReference('type-tenniscourt'));
        $courtANeuilly->addPicture($this->getReference('picture-neuilly'));
        $courtANeuilly->addCharacteristic($this->getReference('characteristic-cloakroom'));
        $courtANeuilly->setUser($this->getReference('user-emeline'));

        $manager->persist($courtANeuilly);

        $this->addReference('advert-tennis-neuilly', $courtANice);


        //Create Advert poolABrest
        $poolABrest = new Advert();
        $poolABrest->setAddress('Brest');
        $poolABrest->setTitle('Une piscine à Brest');
        $poolABrest->setDescription('Un piscine à Brest! What else ?');
        $poolABrest->setPrice(105);
        $poolABrest->setLatitude(48.390394);
        $poolABrest->setLongitude(-4.486076);
        $poolABrest->setType($this->getReference('type-swimmingpool'));
        $poolABrest->addPicture($this->getReference('picture-brest'));
        $poolABrest->addCharacteristic($this->getReference('characteristic-restroom'));
        $poolABrest->setUser($this->getReference('user-valeriane'));

        $manager->persist($poolABrest);

        $this->addReference('advert-pool-brest', $poolABrest);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            TypeFixtures::class,
            PictureFixtures::class,
            CharacteristicFixtures::class
        );
    }
}