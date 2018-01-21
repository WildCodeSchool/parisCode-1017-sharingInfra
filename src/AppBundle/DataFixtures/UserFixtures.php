<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $cindy = new User();
        $cindy->setFirstname('Cindy');
        $cindy->setName('Liwenge');
        $cindy->setEmail('cindy.liwenge@gmail.com');
        $cindy->setPassword('1234');
        $manager->persist($cindy);
        $this->addReference('user-cindy', $cindy);

        $caroline = new User();
        $caroline->setFirstname('Caroline');
        $caroline->setName('Chuong');
        $caroline->setEmail('caroline.chuong@gmail.com');
        $caroline->setPassword('1234');
        $manager->persist($caroline);
        $this->addReference('user-caroline', $caroline);

        $manager->flush();
    }
}
