<?php

namespace AppBundle\Form;

use AppBundle\Entity\Characteristic;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label'=> "Titre de votre annonce"
            ))
            ->add('description')
            ->add('address', TextType::class, array(
                'label'=> "Adresse du bien"
            ))
            ->add('zipcode', TextType::class, array(
                'label'=> "Code postal"
            ))
            ->add('city', TextType::class, array(
                'label'=> "Ville"
            ))
            ->add('price', MoneyType::class, array(
                'label'=> "Prix"
            ))
            ->add('type')
            ->add('characteristics', EntityType::class, array(
                'label'=> "Caractéristiques",
                'expanded' => true,
                'multiple' => true,
                'class' => Characteristic::class,
                'label_attr' => array(
                    'class' => 'checkbox-inline'
                )
            ))
            ->add('pictures', PictureType::class, array(
                'data_class' => null,
                'label' => "Ajouter des photos"
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Advert'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_advert';
    }


}
