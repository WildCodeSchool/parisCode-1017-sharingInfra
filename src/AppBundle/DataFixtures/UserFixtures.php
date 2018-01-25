<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
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
        $caroline->setPassword('4321');
        $manager->persist($caroline);
        $this->addReference('user-caroline', $caroline);

        $emeline = new User();
        $emeline->setFirstname('Emeline');
        $emeline->setName('Ancel-Pirouelle');
        $emeline->setEmail('eap@gmail.com');
        $emeline->setPassword('1423');
        $manager->persist($emeline);
        $this->addReference('user-emeline', $emeline);

        $cyrielle = new User();
        $cyrielle->setFirstname('Cyrielle');
        $cyrielle->setName('Huet');
        $cyrielle->setEmail('cyr-huet@gmail.com');
        $cyrielle->setPassword('5678');
        $manager->persist($cyrielle);
        $this->addReference('user-cyrielle', $cyrielle);

        $valeriane = new User();
        $valeriane->setFirstname('Valeriane');
        $valeriane->setName('Aron');
        $valeriane->setEmail('varon@gmail.com');
        $valeriane->setPassword('8765');
        $manager->persist($valeriane);
        $this->addReference('user-valeriane', $valeriane);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            PictureFixtures::class
        );
    }
}
