<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre nom',
                    'label' => false,
                    'class' => 'form-control input-lg'
                ),
                'constraints' => array(
                    new NotBlank(array("message" => "Merci de renseigner votre nom.")),
                )
            ))
            ->add('email', EmailType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre email',
                    'label' => false,
                    'class' => 'form-control input-lg'
                ),
                'constraints' => array(
                    new NotBlank(array("message" => "Merci de renseigner votre email.")),
                    new Email(array("message" => "Le format de votre email n'est pas valide.")),
                )
            ))
            ->add('message', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre message',
                    'label' => false,
                    'class' => 'form-control input-lg'
                ),
                'constraints' => array(
                    new NotBlank(array("message" => "Merci de renseigner un message.")),
                )
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName()
    {
        return 'contact_form';
    }
}