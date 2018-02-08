<?php

namespace AppBundle\Form;

use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('username')
            ->add('firstname', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre prénom',
                    'label' => false,
                    'class' => 'form-control input-lg'
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci de renseigner votre prénom.'))
                )
            ))
            ->add('name', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre nom',
                    'label' => false,
                    'class' => 'form-control input-lg'
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci de renseigner votre nom.'))
                )
            ))
            ->add('email', EmailType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre email',
                    'label' => false,
                    'class' => 'form-control input-lg'
                ),
                'constraints' => array(
                    new NotBlank(array('message' => 'Merci de renseigner votre email.'))
                )
            ))
            ->add('plainPassword', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\RepeatedType'), array(
                'type' => LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'),
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Choisissez un mot de passe'
                    )),
                'second_options' => array(
                    'label' => false,
                    'attr' => array(
                        'class' => 'form-control input-lg',
                        'placeholder' => 'Confirmez votre mot de passe'
                    )),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}