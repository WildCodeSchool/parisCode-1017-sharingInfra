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
        $poolAParis->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis->setPrice(85);
        $poolAParis->setLatitude(48.8846000);
        $poolAParis->setLongitude(2.2696500);
        $poolAParis->setType($this->getReference('type-swimmingpool'));
        $poolAParis->addPicture($this->getReference('picture-piscine1'));
        $poolAParis->addPicture($this->getReference('picture-piscine2'));
        $poolAParis->addPicture($this->getReference('picture-piscine3'));
        $poolAParis->addCharacteristic($this->getReference('characteristic-wifi'));
        $poolAParis->addCharacteristic($this->getReference('characteristic-serviettes'));
        $poolAParis->setUser($this->getReference('user-emeline'));

        $manager->persist($poolAParis);

        $this->addReference('advert-pool-paris', $poolAParis);

        //Create Advert poolAParis2
        $poolAParis2 = new Advert();
        $poolAParis2->setAddress('46 rue des Orteaux');
        $poolAParis2->setZipcode(75020);
        $poolAParis2->setCity('Paris');
        $poolAParis2->setTitle('Un bassin dans le 20e');
        $poolAParis2->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis2->setPrice(75);
        $poolAParis2->setLatitude(48.8562947);
        $poolAParis2->setLongitude(2.401544);
        $poolAParis2->setType($this->getReference('type-swimmingpool'));
        $poolAParis2->addPicture($this->getReference('picture-piscine4'));
        $poolAParis2->addPicture($this->getReference('picture-piscine5'));
        $poolAParis2->addPicture($this->getReference('picture-piscine6'));
        $poolAParis2->addCharacteristic($this->getReference('characteristic-wifi'));
        $poolAParis2->addCharacteristic($this->getReference('characteristic-serviettes'));
        $poolAParis2->addCharacteristic($this->getReference('characteristic-bouees'));
        $poolAParis2->addCharacteristic($this->getReference('characteristic-parasol'));
        $poolAParis2->setUser($this->getReference('user-cindy'));

        $manager->persist($poolAParis2);

        $this->addReference('advert-pool-paris-2', $poolAParis2);

        //Create Advert poolAParis3
        $poolAParis3 = new Advert();
        $poolAParis3->setAddress('11 rue de Poissy');
        $poolAParis3->setZipcode(75005);
        $poolAParis3->setCity('Paris');
        $poolAParis3->setTitle('Une piscine au bord de la Seine');
        $poolAParis3->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis3->setPrice(120);
        $poolAParis3->setLatitude(48.8490758);
        $poolAParis3->setLongitude(2.3504115);
        $poolAParis3->setType($this->getReference('type-swimmingpool'));
        $poolAParis3->addPicture($this->getReference('picture-piscine7'));
        $poolAParis3->addPicture($this->getReference('picture-piscine8'));
        $poolAParis3->addPicture($this->getReference('picture-piscine9'));
        $poolAParis3->addCharacteristic($this->getReference('characteristic-wifi'));
        $poolAParis3->addCharacteristic($this->getReference('characteristic-serviettes'));
        $poolAParis3->addCharacteristic($this->getReference('characteristic-parasol'));
        $poolAParis3->addCharacteristic($this->getReference('characteristic-wc'));
        $poolAParis3->addCharacteristic($this->getReference('characteristic-douche'));
        $poolAParis3->setUser($this->getReference('user-caroline'));

        $manager->persist($poolAParis3);

        $this->addReference('advert-pool-paris-3', $poolAParis3);

        //Create Advert poolAParis4
        $poolAParis4 = new Advert();
        $poolAParis4->setAddress('54 rue des Pyrénées');
        $poolAParis4->setZipcode(75020);
        $poolAParis4->setCity('Paris');
        $poolAParis4->setTitle('Piscine à deux pas du Père-Lachaise');
        $poolAParis4->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis4->setPrice(67);
        $poolAParis4->setLatitude(48.8490758);
        $poolAParis4->setLongitude(2.3504115);
        $poolAParis4->setType($this->getReference('type-swimmingpool'));
        $poolAParis4->addPicture($this->getReference('picture-piscine10'));
        $poolAParis4->addPicture($this->getReference('picture-piscine11'));
        $poolAParis4->addPicture($this->getReference('picture-piscine12'));
        $poolAParis4->addCharacteristic($this->getReference('characteristic-serviettes'));
        $poolAParis4->addCharacteristic($this->getReference('characteristic-wc'));
        $poolAParis4->setUser($this->getReference('user-cyrielle'));

        $manager->persist($poolAParis4);

        $this->addReference('advert-pool-paris-4', $poolAParis4);

        //Create Advert poolAParis5
        $poolAParis5 = new Advert();
        $poolAParis5->setAddress('8 avenue de la Porte Molitor');
        $poolAParis5->setZipcode(75016);
        $poolAParis5->setCity('Paris');
        $poolAParis5->setTitle('Grande piscine dans les quartiers chics');
        $poolAParis5->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis5->setPrice(250);
        $poolAParis5->setLatitude(48.8451655);
        $poolAParis5->setLongitude(2.2508223);
        $poolAParis5->setType($this->getReference('type-swimmingpool'));
        $poolAParis5->addPicture($this->getReference('picture-piscine13'));
        $poolAParis5->addPicture($this->getReference('picture-piscine14'));
        $poolAParis5->addPicture($this->getReference('picture-piscine15'));
        $poolAParis5->addCharacteristic($this->getReference('characteristic-serviettes'));
        $poolAParis5->addCharacteristic($this->getReference('characteristic-wc'));
        $poolAParis5->addCharacteristic($this->getReference('characteristic-vestiaire'));
        $poolAParis5->addCharacteristic($this->getReference('characteristic-douche'));
        $poolAParis5->addCharacteristic($this->getReference('characteristic-bouees'));
        $poolAParis5->addCharacteristic($this->getReference('characteristic-parasol'));
        $poolAParis5->addCharacteristic($this->getReference('characteristic-wifi'));
        $poolAParis5->setUser($this->getReference('user-emeline'));

        $manager->persist($poolAParis5);

        $this->addReference('advert-pool-paris-5', $poolAParis5);

        //Create Advert poolAParis6
        $poolAParis6 = new Advert();
        $poolAParis6->setAddress('1 quai François Mauriac');
        $poolAParis6->setZipcode(75013);
        $poolAParis6->setCity('Paris');
        $poolAParis6->setTitle('Une petite piscine sur les quais');
        $poolAParis6->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis6->setPrice(80);
        $poolAParis6->setLatitude(48.8363713);
        $poolAParis6->setLongitude(2.3737142);
        $poolAParis6->setType($this->getReference('type-swimmingpool'));
        $poolAParis6->addPicture($this->getReference('picture-piscine16'));
        $poolAParis6->addPicture($this->getReference('picture-piscine17'));
        $poolAParis6->addPicture($this->getReference('picture-piscine18'));
        $poolAParis6->addCharacteristic($this->getReference('characteristic-wc'));
        $poolAParis6->addCharacteristic($this->getReference('characteristic-vestiaire'));
        $poolAParis6->addCharacteristic($this->getReference('characteristic-douche'));
        $poolAParis6->setUser($this->getReference('user-cindy'));

        $manager->persist($poolAParis6);

        $this->addReference('advert-pool-paris-6', $poolAParis6);

        //Create Advert poolAParis7
        $poolAParis7 = new Advert();
        $poolAParis7->setAddress('5 place Paul Verlaine');
        $poolAParis7->setZipcode(75013);
        $poolAParis7->setCity('Paris');
        $poolAParis7->setTitle('Grand bassin sur la Butte-aux-Cailles');
        $poolAParis7->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis7->setPrice(90);
        $poolAParis7->setLatitude(48.8273922);
        $poolAParis7->setLongitude(2.3502428);
        $poolAParis7->setType($this->getReference('type-swimmingpool'));
        $poolAParis7->addPicture($this->getReference('picture-piscine19'));
        $poolAParis7->addPicture($this->getReference('picture-piscine20'));
        $poolAParis7->addPicture($this->getReference('picture-piscine21'));
        $poolAParis7->addCharacteristic($this->getReference('characteristic-wc'));
        $poolAParis7->addCharacteristic($this->getReference('characteristic-vestiaire'));
        $poolAParis7->setUser($this->getReference('user-caroline'));

        $manager->persist($poolAParis7);

        $this->addReference('advert-pool-paris-7', $poolAParis7);

        //Create Advert poolAParis8
        $poolAParis8 = new Advert();
        $poolAParis8->setAddress('70 rue Dunois');
        $poolAParis8->setZipcode(75013);
        $poolAParis8->setCity('Paris');
        $poolAParis8->setTitle('Jacuzzi avec vue sur les toits');
        $poolAParis8->setDescription('Une piscine à Paris ! What else ?');
        $poolAParis8->setPrice(75);
        $poolAParis8->setLatitude(48.8331165);
        $poolAParis8->setLongitude(2.3646489);
        $poolAParis8->setType($this->getReference('type-swimmingpool'));
        $poolAParis8->addPicture($this->getReference('picture-piscine22'));
        $poolAParis8->addPicture($this->getReference('picture-piscine23'));
        $poolAParis8->addPicture($this->getReference('picture-piscine24'));
        $poolAParis8->addCharacteristic($this->getReference('characteristic-wc'));
        $poolAParis8->addCharacteristic($this->getReference('characteristic-vestiaire'));
        $poolAParis8->addCharacteristic($this->getReference('characteristic-douche'));
        $poolAParis8->setUser($this->getReference('user-valeriane'));

        $manager->persist($poolAParis8);

        $this->addReference('advert-pool-paris-8', $poolAParis8);

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