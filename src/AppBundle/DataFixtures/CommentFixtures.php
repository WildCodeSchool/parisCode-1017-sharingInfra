<?php

namespace AppBundle\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\Comment;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $awesome = new Comment();
        $awesome->setComment('Oh-my-god, it was awesome');
        $awesome->setNote(4);

        //$awesome->setAdvert();
        //$awesome->setUser();

        $manager->persist($awesome);

        $lame = new Comment();
        $lame->setComment('Oh-my-god, it was lame af');
        $lame->setNote(1);

        //$lame->setAdvert();
        //$lame->setUser();

        $manager->persist($lame);

        $manager->flush();
    }
}