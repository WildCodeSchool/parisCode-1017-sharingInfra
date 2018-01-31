<?php

namespace AppBundle\Form;

use AppBundle\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        $builder->add('city', TextType::class, array(
            'label' => false,
            'attr' => ['class' => 'form-control input-lg', 'placeholder' => 'Votre destination'],
            'required' => false,
        ))
            ->add('type', EntityType::class, array(
                'class' => Type::class,
                'choice_label' => 'gearType',
                'multiple' => true,
                'expanded' => true,
                'label' => false,
                'required' => false,
                'attr' => array(
                    'class' => 'form-check-input'
                )
            ));
        // 'attr' => ['class'=>'form-control input-lg', 'placeholder'=> 'Votre type'],
        // 'required' => false,
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
