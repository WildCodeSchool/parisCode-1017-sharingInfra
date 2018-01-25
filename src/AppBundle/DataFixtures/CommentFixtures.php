<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //Create Comment awesome
        $awesome = new Comment();
        $awesome->setComment('Oh-my-god, it was awesome');
        $awesome->setNote(4);
        $awesome->setUser($this->getReference('user-cindy'));
        $awesome->setAdvert($this->getReference('advert-tennis-neuilly'));

        $manager->persist($awesome);

        $this->addReference('comment-awesome', $awesome);

        //Create Comment lame
        $lame = new Comment();
        $lame->setComment('Oh-my-god, it was lame af');
        $lame->setUser($this->getReference('user-caroline'));
        $lame->setAdvert($this->getReference('advert-tennis-nice'));
        $lame->setNote(1);

        $manager->persist($lame);

        $this->addReference('comment-lame', $lame);

        //Create Comment mockay
        $mockay = new Comment();
        $mockay->setComment('Mockay');
        $mockay->setUser($this->getReference('user-cyrielle'));
        $mockay->setAdvert($this->getReference('advert-pool-bordeaux'));
        $mockay->setNote(2);

        $manager->persist($mockay);

        $this->addReference('comment-mockay', $mockay);

        //Create Comment woop
        $woop = new Comment();
        $woop->setComment('Woop woop ! Lovin\' it.');
        $woop->setUser($this->getReference('user-emeline'));
        $woop->setAdvert($this->getReference('advert-pool-brest'));
        $woop->setNote(4);

        $manager->persist($woop);

        $this->addReference('comment-woo', $woop);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ReservationFixtures::class
        );
    }
}