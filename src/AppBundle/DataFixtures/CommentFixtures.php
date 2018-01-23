<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Comment;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Create Comment awesome
        $awesome = new Comment();
        $awesome->setComment('Oh-my-god, it was awesome');
        $awesome->setNote(4);
        $awesome->setUser($this->getReference('user-cindy'));
        $awesome->setAdvert($this->getReference(''));

        $manager->persist($awesome);

        $this->addReference('comment-awesome', $awesome);

        //Create Comment lame
        $lame = new Comment();
        $lame->setComment('Oh-my-god, it was lame af');
        $lame->setNote(1);

        $manager->persist($lame);

        $this->addReference('comment-lame', $lame);

        //Create Comment mockay
        $mockay = new Comment();
        $mockay->setComment('Mockay');
        $mockay->setNote(2);

        $manager->persist($mockay);

        $this->addReference('comment-mockay', $mockay);

        //Create Comment woop
        $woop = new Comment();
        $woop->setComment('Woop woop ! Lovin\' it.');
        $woop->setNote(4);

        $manager->persist($woop);

        $this->addReference('comment-woo', $woop);

        $manager->flush();
    }
}