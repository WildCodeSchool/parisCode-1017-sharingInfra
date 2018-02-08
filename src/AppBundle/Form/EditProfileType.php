<?php

namespace AppBundle\Form;

use AppBundle\Entity\Picture;
use FOS\UserBundle\Util\LegacyFormHelper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditProfileType extends AbstractType

{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraintsOptions = array(
            'message' => 'fos_user.current_password.invalid',
        );

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
            ->add('phone', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Votre téléphone',
                    'label' => false,
                    'class' => 'form-control input-lg'
                )
            ))
            ->add('current_password', LegacyFormHelper::getType('Symfony\Component\Form\Extension\Core\Type\PasswordType'), array(
                'label' => false,
                'translation_domain' => 'FOSUserBundle',
                'mapped' => false,
                'attr' => array(
                    'placeholder' => 'Entrez votre mot de passe pour confirmer les modifications',
                    'class' => 'form-control input-lg'
                ),
                'constraints' => array(
                    new NotBlank(),
                    new UserPassword($constraintsOptions),
                ),
            ))
            ->add('description', TextareaType::class, array(
                'attr' => array(
                    'placeholder' => 'Parlez-nous de vous !',
                    'label' => false,
                    'class' => 'form-control input-lg'
                ),
            ))
            ->add('picture', PictureType::class, array(
                'attr' => array(
                    'label' => 'Choisissez votre photo de profil',
                )))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}