<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('address', TextType::class, array(
            'label'=> false,
            'attr' => ['class'=>'form-control input-lg', 'placeholder'=> 'Votre destination'],
            'required' => false,
        ));
        $builder->add('type', TextType::CLASS, [
            'label' => false,
            'attr' => ['class'=>'form-control input-lg', 'placeholder'=> 'Votre type'],
            'required' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false
        ));
    }

}
