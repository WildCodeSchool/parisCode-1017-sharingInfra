<?php
/**
 * Created by PhpStorm.
 * User: cindy
 * Date: 23/01/18
 * Time: 14:51
 */

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //Create Reservation resa1
        $resa1 = new Reservation();
        $resa1->setStatus('pending');
        $resa1->setDate(new \DateTime());
        $resa1->setUser($this->getReference('user-emeline'));
        $resa1->setAdvert($this->getReference('advert-pool-bordeaux'));
        $manager->persist($resa1);

        $this->addReference('resa-resa1', $resa1);

        //Create Reservation resa2
        $resa2 = new Reservation();
        $resa2->setStatus('refused');
        $resa2->setDate(new \DateTime());
        $resa2->setUser($this->getReference('user-caroline'));
        $resa2->setAdvert($this->getReference('advert-tennis-nice'));
        $manager->persist($resa2);

        $this->addReference('resa-resa2', $resa2);


        //Create Reservation resa3
        $resa3 = new Reservation();
        $resa3->setStatus('accepted');
        $resa3->setDate(new \DateTime());
        $resa3->setUser($this->getReference('user-cyrielle'));
        $resa3->setAdvert($this->getReference('advert-tennis-neuilly'));
        $manager->persist($resa3);

        $this->addReference('resa-resa3', $resa3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            AdvertFixtures::class
        );
    }
}