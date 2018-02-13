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
        $poolABordeaux->setAddress('60 cours de Luze');
        $poolABordeaux->setZipcode(33300);
        $poolABordeaux->setCity('Bordeaux');
        $poolABordeaux->setTitle('Une piscine à Bordeaux');
        $poolABordeaux->setDescription('Une belle piscine à Bordeaux ! What else ?');
        $poolABordeaux->setPrice(45);
        $poolABordeaux->setLatitude(44.953308);
        $poolABordeaux->setLongitude(-0.597129);
        $poolABordeaux->setType($this->getReference('type-swimmingpool'));
        $poolABordeaux->addPicture($this->getReference('picture-piscine6'));
        $poolABordeaux->addPicture($this->getReference('picture-piscine7'));
        $poolABordeaux->addCharacteristic($this->getReference('characteristic-wc'));
        $poolABordeaux->addCharacteristic($this->getReference('characteristic-wifi'));
        $poolABordeaux->addCharacteristic($this->getReference('characteristic-douche'));
        $poolABordeaux->setUser($this->getReference('user-cindy'));

        $manager->persist($poolABordeaux);

        $this->addReference('advert-pool-bordeaux', $poolABordeaux);


        //Create Advert courtANice
        $courtANice = new Advert();
        $courtANice->setAddress('2 rue Jean Allègre');
        $courtANice->setZipcode(06000);
        $courtANice->setCity('Nice');
        $courtANice->setTitle('Un court de tennis à Nice');
        $courtANice->setDescription('Un court de tennis à Nice ! What else ?');
        $courtANice->setPrice(55);
        $courtANice->setLatitude(43.7101728);
        $courtANice->setLongitude(7.2619532);
        $courtANice->setType($this->getReference('type-tenniscourt'));
        $courtANice->addPicture($this->getReference('picture-tennis1'));
        $courtANice->addCharacteristic($this->getReference('characteristic-vestiaire'));
        $courtANice->addCharacteristic($this->getReference('characteristic-raquettes'));
        $courtANice->setUser($this->getReference('user-caroline'));

        $manager->persist($courtANice);

        $this->addReference('advert-tennis-nice', $courtANice);



        //Create Advert courtANeuilly
        $courtANeuilly = new Advert();
        $courtANeuilly->setAddress('27 boulevard d\'Inkermann');
        $courtANeuilly->setZipcode(92200);
        $courtANeuilly->setCity('Neuilly-sur-Seine');
        $courtANeuilly->setTitle('Un court de tennis à Neuilly');
        $courtANeuilly->setDescription('Un court de tennis à Neuilly ! What else ?');
        $courtANeuilly->setPrice(85);
        $courtANeuilly->setLatitude(48.8846000);
        $courtANeuilly->setLongitude(2.2696500);
        $courtANeuilly->setType($this->getReference('type-tenniscourt'));
        $courtANeuilly->addPicture($this->getReference('picture-tennis1'));
        $courtANeuilly->addCharacteristic($this->getReference('characteristic-vestiaire'));
        $courtANeuilly->addCharacteristic($this->getReference('characteristic-wc'));
        $courtANeuilly->addCharacteristic($this->getReference('characteristic-wifi'));
        $courtANeuilly->setUser($this->getReference('user-emeline'));

        $manager->persist($courtANeuilly);

        $this->addReference('advert-tennis-neuilly', $courtANice);


        //Create Advert poolABrest
        $poolABrest = new Advert();
        $poolABrest->setAddress('14 rue de Maissin');
        $poolABrest->setZipcode(29200);
        $poolABrest->setCity('Brest');
        $poolABrest->setTitle('Une piscine à Brest');
        $poolABrest->setDescription('Une piscine à Brest ! What else ?');
        $poolABrest->setPrice(105);
        $poolABrest->setLatitude(48.390394);
        $poolABrest->setLongitude(-4.486076);
        $poolABrest->setType($this->getReference('type-swimmingpool'));
        $poolABrest->addPicture($this->getReference('picture-piscine1'));
        $poolABrest->addPicture($this->getReference('picture-piscine2'));
        $poolABrest->addCharacteristic($this->getReference('characteristic-wc'));
        $poolABrest->setUser($this->getReference('user-valeriane'));

        $manager->persist($poolABrest);

        $this->addReference('advert-pool-brest', $poolABrest);

        //Create Advert poolAParis
        $poolAParis = new Advert();
        $poolAParis->setAddress('16 rue Thouin');
        $poolAParis->setZipcode(75005);
        $poolAParis->setCity('Paris');
        $poolAParis->setTitle('Une piscine à Paris');
        $poolAParis->setDescription('Une piscine à Paris! What else ?');
        $poolAParis->setPrice(85);
        $poolAParis->setLatitude(48.8846000);
        $poolAParis->setLongitude(2.2696500);
        $poolAParis->setType($this->getReference('type-swimmingpool'));
        $poolAParis->addPicture($this->getReference('picture-piscine3'));
        $poolAParis->addPicture($this->getReference('picture-piscine4'));
        $poolAParis->addPicture($this->getReference('picture-piscine5'));
        $poolAParis->addCharacteristic($this->getReference('characteristic-wifi'));
        $poolAParis->addCharacteristic($this->getReference('characteristic-serviettes'));
        $poolAParis->setUser($this->getReference('user-emeline'));

        $manager->persist($poolAParis);

        $this->addReference('advert-pool-paris', $poolAParis);

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