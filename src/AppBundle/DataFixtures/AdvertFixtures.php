<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Advert;

class AdvertFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $poolABordeaux = new Advert();
        $poolABordeaux->setAddress('Bordeaux');
        $poolABordeaux->setTitle('Une piscine à Bordeaux');
        $poolABordeaux->setDescription('Une belle piscine à Bordeaux ! What else ?');
        $poolABordeaux->setPrice(45);
        $poolABordeaux->setLatitude(44.953308);
        $poolABordeaux->setLongitude(-0.597129);
        $poolABordeaux->setType($this->getReference('type-swimmingpool'));
        $poolABordeaux->addPicture($this->getReference('picture-bordeaux'));
        $poolABordeaux->setUser($this->getReference('user-cindy'));

        //$poolABordeaux->addComment();
        //$poolABordeaux->addCharacteristic();
        //$poolABordeaux->addReservation();

        $manager->persist($poolABordeaux);

        $courtANice = new Advert();
        $courtANice->setAddress('Nice');
        $courtANice->setTitle('Un court de tennis à Nice');
        $courtANice->setDescription('Un court de tennis à Nice! What else ?');
        $courtANice->setPrice(55);
        $courtANice->setLatitude(43.7101728);
        $courtANice->setLongitude(7.2619532);
        $courtANice->setType($this->getReference('type-tenniscourt'));
        $courtANice->addPicture($this->getReference('picture-nice'));
        $courtANice->setUser($this->getReference('user-caroline'));

        //$courtANice->addComment();
        //$courtANice->addCharacteristic();
        //$courtANice->addReservation();

        $manager->persist($courtANice);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}