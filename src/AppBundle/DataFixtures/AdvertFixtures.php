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
        //Create Advert poolABordeaux
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
        $poolABordeaux->addComment($this->getReference('comment-awesome'));
        $poolABordeaux->addReservation($this->getReference('resa-resa2'));

        $manager->persist($poolABordeaux);



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
        $courtANice->addComment($this->getReference('comment-awesome'));
        $courtANice->addReservation($this->getReference('resa-resa1'));

        $manager->persist($courtANice);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            TypeFixtures::class,
            PictureFixtures::class,
            CharacteristicFixtures::class,
            CommentFixtures::class,
            ReservationFixtures::class
        );
    }
}